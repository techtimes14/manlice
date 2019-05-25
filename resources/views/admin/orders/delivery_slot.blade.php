<select name="time_slot_id_{{ $count_value }}" id="time_slot_id_{{ $count_value }}" class="form-control selectpicker time_slot_class" data-live-search="true" data-live-search-placeholder="Select" data-actions-box="true" placeholder="Select" required>
    <option value="" data-timeslotcurrentcount="{{ $count_value }}" data-timeslot="">Select</option>
<?php
$empty_flag = 0;
if ( $all_slots != null && count($all_slots) > 0 ) {
    foreach ( $all_slots as $slot ) {
        if( strtotime(date('Y-m-d',strtotime($current_date))) == strtotime(date('Y-m-d', strtotime($shipping_date))) ) {

            if( strtotime($current_date) < strtotime($slot->start_time) ) {
                $empty_flag++;
?>
                <option value="{{ $slot->id }}" data-timeslotcurrentcount="{{ $count_value }}" data-timeslot="{!! date('H:i', strtotime($slot->start_time)).' - '.date('H:i', strtotime($slot->end_time)).'&nbsp;Hrs' !!}">{!! date('H:i', strtotime($slot->start_time)).' - '.date('H:i', strtotime($slot->end_time)).'&nbsp;Hrs' !!}</option>
<?php
            }
        }else{
            $empty_flag++;
?>
                <option value="{{ $slot->id }}" data-timeslotcurrentcount="{{ $count_value }}" data-time="{!! date('H:i', strtotime($slot->start_time)).' - '.date('H:i', strtotime($slot->end_time)).'&nbsp;Hrs' !!}">{!! date('H:i', strtotime($slot->start_time)).' - '.date('H:i', strtotime($slot->end_time)).'&nbsp;Hrs' !!}</option>
<?php
        }
    }
    if( $empty_flag == 0 ){
        echo '<option value="" data-timeslotcurrentcount="{{ $count_value }}" data-time="">Select</option>';
    }
}
?>
</select>

<script type="text/javascript">
$(document).off('change', 'select.time_slot_class');
$(document).on('change', 'select.time_slot_class', function(){
    var all_months = new Array('JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC');

    var time_slot_id        = $(this).val();
    var time                = $(this).find(':selected').attr('data-time');
    var deliverytiming      = time;
    var timeslotcurrentcount= $(this).find(':selected').attr('data-timeslotcurrentcount');
    var ship_method_title   = $('#shippingmethod_name_'+timeslotcurrentcount).val();
    var ship_method_price   = $('#ship_price_'+timeslotcurrentcount).val();

    alert(time_slot_id);

    if(time_slot_id != '' &&  time != '') {
        $('#delivery_time_id_'+timeslotcurrentcount).val(time_slot_id);
        $('#deliverytime_'+timeslotcurrentcount).val(time);

        var complete_shipping_date = new Date('{{ $shipping_date }}');
        var sdate                  = complete_shipping_date.getDate();
        var shipping_month         = complete_shipping_date.getMonth();

        $('#delivery_time_id_'+timeslotcurrentcount).val(time_slot_id);
        $('deliverytime_'+timeslotcurrentcount).val(time);

        $('#delivery_slots_'+timeslotcurrentcount).html('');
        $('#delivery_slots_'+timeslotcurrentcount).removeClass('delivery');

        $('#delivery_slots_'+timeslotcurrentcount).html(
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


    }else{
      $('#delivery_slots_'+timeslotcurrentcount).html('');
      $('#delivery_time_id_'+timeslotcurrentcount).val(0);
      $('deliverytime_'+timeslotcurrentcount).val(0);
    }
});
</script>