<select name="shipping_method_id_{{ $count_value }}" id="shipping_method_id_{{ $count_value }}" class="form-control selectpicker shippingmethod_class" data-live-search="true" data-live-search-placeholder="Select" data-actions-box="true" placeholder="Select" required>
    <option value="" data-shipmethodcurrentcount="{{ $count_value }}" data-shipmethodprice="" data-shipmethodname="">Select</option>
<?php
if( $all_shipping_methods->count() > 0 ) {
    foreach($all_shipping_methods as $product_shipping) {
        if( count($product_shipping->delivery_timing) > 0 ) {

            //If Delivery method has Single Delivery Timing Option Start
            if( count($product_shipping->delivery_timing) == 1 ) {

                $time_not_over_flag = 0;
                //Current Day == Selected Day
                if( strtotime(date('Y-m-d',strtotime($current_date))) == strtotime(date('Y-m-d', strtotime($shipping_date))) ) {
                    //echo $current_date."<==>".$product_shipping->delivery_timing[0]->start_time.'<br>'.strtotime('2019-01-11 18:28:11').'=='.strtotime('18:28:11');
                    if( strtotime($current_date) < strtotime($product_shipping->delivery_timing[0]->start_time) ) {
                        $time_not_over_flag++;
                    }
                }else{
                    $time_not_over_flag++;
                }

                if($time_not_over_flag > 0) {

                    $shp_prc = $product_shipping->price;
                    if($product_shipping->price > 0) {
                        $shipping_price = Currency::manualOrderCurrency($shp_prc, $current_currency, ['need_currency' => true, 'number_format' => config('global.number_format_limit')]);
                    }else{
                        $shipping_price = 'Free';
                    }
                    $time_slot = date('H:i', strtotime($product_shipping->delivery_timing[0]->start_time)).' - '.date('H:i', strtotime($product_shipping->delivery_timing[0]->end_time)).'&nbsp;Hrs';
?>
                    <option value="{{ $product_shipping->id }}" data-shipmethodcurrentcount="{{ $count_value }}" data-shipmethodprice="{{ $shp_prc }}" data-title="{{ $product_shipping->title }}" data-slotnos="{{ count($product_shipping->delivery_timing) }}" data-slotid="{!! $product_shipping->delivery_timing[0]->id !!}" data-slottime="{!! date('H:i', strtotime($product_shipping->delivery_timing[0]->start_time)).' - '.date('H:i', strtotime($product_shipping->delivery_timing[0]->end_time)).' Hrs' !!}">
                        {!! $product_shipping->title .' ('.$shipping_price.')'.' ('.$time_slot.')' !!}
                    </option>
<?php
                }
            }
            //If Delivery method has Single Delivery Timing Option End

            //If Delivery method has Multiple Delivery Timing Option Start
            else{

                $time_not_over_flag = 0;

                //Current Day == Selected Day
                if( strtotime(date('Y-m-d',strtotime($current_date))) == strtotime(date('Y-m-d', strtotime($shipping_date))) ) {
                    //Checking if all Timing Slots are less than Current Time
                    foreach ($product_shipping->delivery_timing as $deli_tym) {
                        if( strtotime($current_date) < strtotime($deli_tym->start_time) ) {
                            $time_not_over_flag++;
                        }
                    }
                }else{
                    $time_not_over_flag++;
                }

                if($time_not_over_flag > 0) {

                    $shp_prc = $product_shipping->price;
                    if($product_shipping->price > 0) {
                        $shipping_price = Currency::manualOrderCurrency($shp_prc, $current_currency, ['need_currency' => true, 'number_format' => config('global.number_format_limit')]);
                    }else{
                        $shipping_price = 'Free';
                    }
?>
                    <option value="{{ $product_shipping->id }}" data-shipmethodcurrentcount="{{ $count_value }}" data-shipmethodprice="{{ $shp_prc }}" data-title="{{ $product_shipping->title }}" data-slotnos="{{ count($product_shipping->delivery_timing) }}" data-slotid="0" data-slottime="0">{!! $product_shipping->title .' ('.$shipping_price.')' !!}</option>
<?php
                }

            }
            //If Delivery method has Multiple Delivery Timing Option End
        }
    }
?>

<script type="text/javascript">
  $(document).off('change', 'select.shippingmethod_class');
  $(document).on('change', 'select.shippingmethod_class', function(){

    var shipping_method_id     = $(this).val();
    var shipmethodcurrentcount = $(this).find(':selected').attr('data-shipmethodcurrentcount');
    var shipping_date          = $('#product_delivery_date_'+shipmethodcurrentcount).val();

    $('#delivery_slots_'+shipmethodcurrentcount).addClass('delivery_disable');
    $('#delivery_slots_'+shipmethodcurrentcount).html('');
    $('#shippingmethod_id_'+shipmethodcurrentcount).val(shipping_method_id);

    //alert(shipping_method_id);

    if( shipping_date != '' && shipping_method_id != '' ) {
        var slotnos = $(this).find(':selected').attr('data-slotnos');

        var ship_method_title = $(this).find(':selected').attr('data-title');
        var ship_method_price = $(this).find(':selected').attr('data-shipmethodprice');

        //If 1 slot then no need to open Timing Slots select just put values in Hidden fields
        if(slotnos == 1) {
            var all_months = new Array('JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC');

            var slotid   = $(this).find(':selected').attr('data-slotid');
            var deliverytiming = $(this).find(':selected').attr('data-slottime');

            $('#delivery_time_id_'+shipmethodcurrentcount).val(slotid);
            $('#deliverytime_'+shipmethodcurrentcount).val(deliverytiming);
            $('#shippingmethod_name_'+shipmethodcurrentcount).val(ship_method_title);
            $('#ship_price_'+shipmethodcurrentcount).val(ship_method_price);

            var complete_shipping_date  = new Date(shipping_date);
            var sdate                   = complete_shipping_date.getDate();
            var shipping_month          = complete_shipping_date.getMonth();

            $('#delivery_slots_'+shipmethodcurrentcount).html('');
            $('#delivery_slots_'+shipmethodcurrentcount).removeClass('delivery');

            $('#delivery_slots_'+shipmethodcurrentcount).html(
                                    '<span id="deliverydateofmonth">'+sdate+'</span>'+
                                    '<span id="deliverymonth">'+all_months[shipping_month]+'</span>'+
                                    '<span id="shippingmethod">'+ship_method_title+' : '+
                                        '<span id="shippingcost" class="webprice">'+
                                            '<meta itemprop="priceCurrency" content="INR">'+
                                            '<meta itemprop="price" content="'+ship_method_price+'">{!! Currency::default("'+ship_method_price+'", ["need_currency" => true]) !!}'+
                                        '</span>'+
                                    '</span>'+
                                    '<span id="week">{!! strtoupper($delivery_day) !!}</span>'+
                                    '<span id="week">'+deliverytiming+'</span>'
                                );
        }

        //If multiple slots then open Timing Slots popup
        else{
            $('#delivery_slots_'+shipmethodcurrentcount).addClass('delivery');

            $('#shippingmethod_name_'+shipmethodcurrentcount).val(ship_method_title);
            $('#ship_price_'+shipmethodcurrentcount).val(ship_method_price);
            $('delivery_time_id_'+shipmethodcurrentcount).val(0);
            $('deliverytime_'+shipmethodcurrentcount).val(0);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route("admin.orders.delivery-time-slot") }}',
                method: 'POST',
                data: {shipping_date: shipping_date, shipping_method_id: shipping_method_id, count_value: shipmethodcurrentcount},
                success: function(response_data) {
                  $('#time_slot_div_'+shipmethodcurrentcount).html(response_data);
                  $('.selectpicker').selectpicker('render').selectpicker('refresh');
                }
            });

        }
    }else{
        $('#shippingmethod_name_'+shipmethodcurrentcount).val('');
        $('#ship_price_'+shipmethodcurrentcount).val(0);
        $('#delivery_time_id_'+shipmethodcurrentcount).val(0);
        $('deliverytime_'+shipmethodcurrentcount).val(0);

        $('#time_slot_div_'+shipmethodcurrentcount).html('<select name="time_slot_id_'+shipmethodcurrentcount+'" id="time_slot_id_'+shipmethodcurrentcount+'" class="form-control selectpicker time_slot_class" data-live-search="true" data-live-search-placeholder="Select" data-actions-box="true" placeholder="Select" required disabled><option value="" data-timeslotcurrentcount="'+shipmethodcurrentcount+'" data-timeslot="">Select</option></select>');
        $('.selectpicker').selectpicker('render').selectpicker('refresh');
    }

  });
  </script>

<?php
}
else{
    echo '<p>No shipping method available.</p>';
}
?>
