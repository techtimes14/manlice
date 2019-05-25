<div id="details_{{ $count_value }}">
  <style type="text/css">
  .addon_blocks{width: 32%; min-height: 79px; display: flex; float: left; border: 1px solid #b5b5b5; margin:0 12px 20px 0; padding-left: 0;}
  .addon_block_img{width: 78px; border-right: 1px solid #b5b5b5; margin-right: 10px;}
  .addon_block_img img {width: 77px; float: left; height: 77px; }
  .addon_detail{font-size: 14px;}
  .addon_detail .checkbox{position: relative; display: block; margin-top: 10px;}
  .addon_detail label{display: inline-block; max-width: 100%; margin-bottom: 5px; font-weight: 700;}
  .addon_detail label{min-height: 20px; padding-left: 20px; margin-bottom: 0px; font-weight: 400; cursor: pointer; }
  .addon_detail .checkbox input[type="checkbox"] {position: absolute; margin-left: -20px; cursor: pointer;}
  .addon_detail input[type="checkbox"]{line-height: normal; margin: 5px 0px 0px;}
  .delivery{opacity: 0.4;}
  </style>

  <input type="hidden" name="" value="{{ $count_value }}">

  <input type="text" name="productid_{{ $count_value }}" id="productid_{{ $count_value }}" value="{{ $product_details->id }}" />
  <br />

<?php
  /* Attribute Section Start */
  if ( $product_details->has_attribute == 'YES' ) {
    if ( $product_details->product_attribute != null ) {
?>
    <div class="form-group">
      <div class="row">
        <?php /*<label for="attribute" class="col-sm-12 col-form-label">Attribute:</label>*/ ?>
      <?php
      $d=1;
      foreach ( $product_details->product_attribute as $attribute ) {
        $price = Currency::manualOrderCurrency($attribute->price, $current_currency, ['need_currency' => true, 'number_format' => config('global.number_format_limit')]);
        if($d==1) {
      ?>
        <script type="text/javascript">
        $(document).ready(function(){
          $('#optradio_{{ $d }}_{{ $count_value }}').attr('checked');

          $('#product_attr_id_{{ $count_value }}').val({{ $attribute->id }});
        });
        </script>
      <?php
        }
      ?>
        <div class="col-sm-12">
          <div class="form-radio" style="margin-top:0; margin-bottom:10px;">
            <label class="form-check-label">
              <input type="radio" name="optradio_{{ $count_value }}" id="optradio_{{ $d }}_{{ $count_value }}" class="pro_attr form-check-input" data-attrid="{{ $attribute->id }}" data-currentcount="{{ $count_value }}" value="{{ $attribute->id }}" <?php if($d==1)echo 'checked="checked"';?> autocomplete="off">
              {!! $attribute->title !!} ( {!! $price !!} )
              <i class="input-helper"></i>
            </label>
          </div>
        </div>
      <?php
        $d++;
      }
      ?>
      </div>
    </div>
<?php
    }
  }
  /* Attribute Section End */
  else{
    echo '<label class="form-check-label">Price : '.Currency::manualOrderCurrency($product_details->price, $current_currency, ['need_currency' => true, 'number_format' => config('global.number_format_limit')]).'</label><br>';
  }
?>

  <!-- Extra Addon Section Start -->
  <div class="row">
  <?php
  if ( count($all_extra_addons) > 0 ) {
    $g=1;
  ?>
    <label for="attribute" class="col-sm-12 col-form-label">Extra Addons</label>
    <div class="col-md-12">
  <?php
    foreach ( $all_extra_addons as $product_extra ) {
      if ( $product_extra->image != null ) {
        if ( file_exists(public_path('/uploaded/product_extra/thumb/'.$product_extra->image) ) ) {
          $extra_image = URL::to('/') . '/uploaded/product_extra/thumb/'.$product_extra->image;
        }else{
          $extra_image = URL::to('/').config('global.no_image_thumb');
        }
      }else{
        $extra_image = URL::to('/').config('global.no_image_thumb');
      }
  ?>  
      <div class="addon_blocks">
        <div class="addon_block_img">
          <div>
            <img src="{{ $extra_image }}" class="img-responsive" >
          </div>
        </div>
        <div class="addon_detail">
          <div class="checkbox">
            <label>
              <input type="checkbox" class="pro_extra" value="{{ $product_extra->id }}" data-extraaddoncurrentcount="{{ $count_value }}" autocomplete="off">{{ $product_extra->title }}<br/>
              {!! Currency::manualOrderCurrency($product_extra->price, $current_currency, ['need_currency' => true, 'number_format' => config('global.number_format_limit')]) !!}
            </label>
          </div>
        </div>
      </div>
  <?php
    }
  ?>
    </div>
  <?php
  }
  ?>
  </div>
  <!-- Extra Addon Section End -->

  <!-- Gift Addon Section Start -->
  <div class="row">
  <?php
  if ( $gift_addons != null && count($gift_addons) > 0 ) {
  ?>
    <label for="attribute" class="col-sm-12 col-form-label">Gift Addons</label>
    <div class="col-md-12">
  <?php
    foreach ( $gift_addons as $gift_addon ) {
      if( $gift_addon->image != null ) {
        if(file_exists(public_path('/uploaded/addon_gift/thumb/'.$gift_addon->image))) {
          $gift_image = URL::to('/') . '/uploaded/addon_gift/thumb/'.$gift_addon->image;
        }else{
          $gift_image = URL::to('/').config('global.no_image_thumb');
        }      
      }else{
        $gift_image = URL::to('/').config('global.no_image_thumb');
      }
  ?>
      <div class="addon_blocks">
        <div class="addon_block_img">
          <div>
            <img src="{{ $gift_image }}" class="img-responsive" >
          </div>
        </div>
        <div class="addon_detail">
          <div class="checkbox">
            <label>
              <input type="checkbox" class="giftaddon" value="{{ $gift_addon->id }}" autocomplete="off" data-giftaddoncurrentcount="{{ $count_value }}" autocomplete="off">{{ $gift_addon->title }}<br/>
              {!! Currency::manualOrderCurrency($gift_addon->price, $current_currency, ['need_currency' => true, 'number_format' => config('global.number_format_limit')]) !!}
            </label>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    </div>
  <?php
    }
  ?>
  </div>
  <!-- Gift Addon Section End -->

  <!-- Delivery Date Section Start -->
  <script type="text/javascript">
  $('#shipping_date_{{ $count_value }}').datepicker({
    format: 'yyyy-mm-dd',
    minDate: new Date('{{ $product_details->delivery_delay_days_from }}')
  });


  $('#shipping_date_{{ $count_value }}').change(function () {
    $('#product_delivery_date_{{ $count_value }}').val($(this).val());

    var shippingdate           = $(this).val();
    var productid              = $('#productid_{{ $count_value }}').val();
    var shipmethodcurrentcount = '{{ $count_value }}';
    var current_currency       = '{{ $current_currency }}';

    if( shippingdate != '' ) {
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '{{ route("admin.orders.delivery-method") }}',
        method: 'POST',
        data: {product_id: productid, shipping_date: shippingdate, current_currency: current_currency, count_value: {{ $count_value }}},
        success: function(response_data) {
          $('#shipping_method_div_'+shipmethodcurrentcount).html(response_data);
          $('#shipping_method_id_'+shipmethodcurrentcount).prop("disabled", false);
          $('.selectpicker').selectpicker('render').selectpicker('refresh');
        }
      });
    }else{
      $('#shipping_method_div_'+shipmethodcurrentcount).html('<select required="" class="form-control selectpicker shipping_method_class" id="shipping_method_id_1" data-live-search="true" data-live-search-placeholder="Select" data-actions-box="true" disabled="true" name="shipping_method_id_1" tabindex="-98"><option selected="selected" value="">Select</option></select>');
      $('.selectpicker').selectpicker('render').selectpicker('refresh');

      $('#time_slot_div_'+shipmethodcurrentcount).html('<select required="" class="form-control selectpicker" id="time_slot_id_1" data-live-search="true" data-live-search-placeholder="Select" data-actions-box="true" disabled="true" name="time_slot_id_1" tabindex="-98"><option selected="selected" value="">Select</option></select>');
      $('.selectpicker').selectpicker('render').selectpicker('refresh');

      $('#delivery_slots_'+shipmethodcurrentcount).html('');
    }
  });
  </script>

  <div class="form-group">
    <label for="title">{{ __('Delivery Date') }}<span class="text-danger">&#042;</span></label>
    <div class="col-md-3" style="padding-left: 0;">
      {!! Form::text('shipping_date_'.$count_value, null, array('required', 'class'=>'form-control shippingmethod_class', 'placeholder' => '', 'id' => 'shipping_date_'.$count_value, 'readonly' => 'true', 'autocomplete' => 'off')) !!}
    </div>
  </div>
  <!-- Delivery Date Section End -->

  <?php //dd($product_details->shipping_method); ?>

  <!-- Shipping Method Section Start -->
  <div class="form-group">
    <label for="title">{{ __('Shipping Method') }}<span class="text-danger">&#042;</span></label>
    <div id="shipping_method_div_{{ $count_value }}">
      {{ Form::select('shipping_method_id_'.$count_value, [], null,array('required', 'class'=>'form-control selectpicker shipping_method_class', 'id'=>'shipping_method_id_'.$count_value, 'data-live-search'=>'true', 'data-live-search-placeholder'=>'Select', 'placeholder'=>'Select', 'data-actions-box'=>'true', 'disabled'=>'true')) }}
    </div>
  </div>
  <!-- Shipping Method Section End -->

  <?php /*
  <!-- Shipping Method Section Start -->
  <div class="form-group">
    <label for="title">{{ __('Shipping Method') }}<span class="text-danger">&#042;</span></label>
    <div id="shipping_method_div_{{ $count_value }}">

      <select name="shipping_method_id_{{ $count_value }}" id="shipping_method_id_{{ $count_value }}" class="form-control selectpicker shipping_method_class" data-live-search="true" data-live-search-placeholder="Select" data-actions-box="true" placeholder="Select" disabled required>
        <option value="" data-shipmethodcurrentcount="{{ $count_value }}" data-shipmethodprice="" data-shipmethodname="">Select</option>
  <?php
  if(isset(($product_details->shipping_method)) && count($product_details->shipping_method) > 0) {
    foreach ($product_details->shipping_method as $method) {
      $shp_prc = $method->shipping_method->price;
      if($method->shipping_method->price > 0) {
        $shipping_price = Currency::manualOrderCurrency($shp_prc, $current_currency, ['need_currency' => true, 'number_format' => config('global.number_format_limit')]);
      }else{
        $shipping_price = 'Free';
      }      
  ?>
      <option value="{{ $method->shipping_method_id }}" data-shipmethodcurrentcount="{{ $count_value }}" data-shipmethodprice="{{ $shp_prc }}" data-shipmethodname="{{ $method->shipping_method->title }}">{{ $method->shipping_method->title .' ('.$shipping_price.')' }}</option>
  <?php
    }
  }
  ?>
      </select>

    </div>
  </div>
  <script type="text/javascript">
  $(document).off('change', 'select.shipping_method_class');
  $(document).on('change', 'select.shipping_method_class', function(){
    var shipping_method_id     = $(this).val();
    var shipmethodcurrentcount = $(this).find(':selected').attr('data-shipmethodcurrentcount');
    var shipmethodname         = $(this).find(':selected').attr('data-shipmethodname');
    var shipmethodprice        = $(this).find(':selected').attr('data-shipmethodprice');
    var shippingdate           = $('#product_delivery_date_'+shipmethodcurrentcount).val();     

    if(shipping_method_id != '' &&  shipmethodname != '' && shipmethodprice != '' && shippingdate != '' ) {
      $('#shippingmethod_id_'+shipmethodcurrentcount).val(shipping_method_id);
      $('#shippingmethod_name_'+shipmethodcurrentcount).val(shipmethodname);
      $('#ship_price_'+shipmethodcurrentcount).val(shipmethodprice);

      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '{{ route("admin.orders.delivery-time-slot") }}',
        method: 'POST',
        data: {shipping_date: shippingdate, shipping_method_id: shipping_method_id, count_value: shipmethodcurrentcount},
        success: function(response_data) {
          $('#time_slot_div_'+shipmethodcurrentcount).html(response_data);
          $('.selectpicker').selectpicker('render').selectpicker('refresh');
        }
      });
    }else{
      $('#shippingmethod_id_'+shipmethodcurrentcount).val(0);
      $('#shippingmethod_name_'+shipmethodcurrentcount).val('');
      $('#ship_price_'+shipmethodcurrentcount).val('');

      $('#time_slot_div_'+shipmethodcurrentcount).html('<select name="time_slot_id_'+shipmethodcurrentcount+'" id="time_slot_id_'+shipmethodcurrentcount+'" class="form-control selectpicker time_slot_class" data-live-search="true" data-live-search-placeholder="Select" data-actions-box="true" placeholder="Select" required disabled><option value="" data-timeslotcurrentcount="'+shipmethodcurrentcount+'" data-timeslot="">Select</option></select>');
      $('.selectpicker').selectpicker('render').selectpicker('refresh');
    }
  });
  </script>
  <!-- Shipping Method Section End -->
  */ ?>

  <!-- Time Slot Section Start -->
  <div class="form-group">
    <label for="title">{{ __('Time Slot') }}<span class="text-danger">&#042;</span></label>
    <div id="time_slot_div_{{ $count_value }}">
      {{ Form::select('time_slot_id_'.$count_value, [], null,array('required', 'class'=>'form-control selectpicker', 'id'=>'time_slot_id_'.$count_value, 'data-live-search'=>'true', 'data-live-search-placeholder'=>'Select', 'placeholder'=>'Select', 'data-actions-box'=>'true', 'disabled'=>'true')) }}
    </div>
  </div>
  <!-- Time Slot Section End -->

  <!-- Delivery Date, Method, Time and Price Start -->
  <div class="form-group">
    <label for="title">{{ __('Delivery') }}</label>
    <div id="delivery_slots_{{ $count_value }}" class="delivery" style="min-height: 80px; background-color: #e8ebee;"></div>
  </div>
  <!-- Time Slot Section End -->


  <br><br>
  delivery_delay_days: <input type="text" name="delivery_delay_days_{{ $count_value }}" id="delivery_delay_days_{{ $count_value }}" value="<?php echo $product_details->delivery_delay_days;?>">

  delivery_delay_days_from: <input type="text" name="delivery_delay_days_from_{{ $count_value }}" id="delivery_delay_days_from_{{ $count_value }}" value="<?php echo $product_details->delivery_delay_days_from;?>">

  <br>
  category_id: <input type="text" name="category_id_{{ $count_value }}" id="category_id_{{ $count_value }}" value="<?php if($product_details->categories_id != NULL)echo $product_details->categories_id; echo 0;?>">, 
  occasion_id: <input type="text" name="occasion_id_{{ $count_value }}" id="occasion_id_{{ $count_value }}" value="<?php if($product_details->occasions_id != NULL)echo $product_details->occasions_id; echo 0;?>">, 

  product_id: <input type="text" name="product_id_{{ $count_value }}" id="product_id_{{ $count_value }}" value="{{ $product_details->id }}">,

  attribute_id: <input type="text" name="product_attr_id_{{ $count_value }}" id="product_attr_id_{{ $count_value }}" autocomplete="off" value="0">, 
  <br>

  extra_addon_ids: <input type="text" name="product_extra_id_{{ $count_value }}" id="product_extra_id_{{ $count_value }}" autocomplete="off" value="">, 

  gift_addon_ids: <input type="text" name="giftaddon_ids_{{ $count_value }}" id="giftaddon_ids_{{ $count_value }}" autocomplete="off" value="">, 
  <br>

  <!-- Delivery section fields start -->
  product_delivery_date: <input type="text" name="product_delivery_date_{{ $count_value }}" id="product_delivery_date_{{ $count_value }}" value="" autocomplete="off">, 
  <br>

  shippingmethod_id: <input type="text" name="shippingmethod_id_{{ $count_value }}" id="shippingmethod_id_{{ $count_value }}" value="0" autocomplete="off">, 

  shippingmethod_name: <input type="text" name="shippingmethod_name_{{ $count_value }}" id="shippingmethod_name_{{ $count_value }}" value="" autocomplete="off">, 
  <br>

  ship_price: <input type="text" name="ship_price_{{ $count_value }}" id="ship_price_{{ $count_value }}" value="0" autocomplete="off">, 

  delivery_time_id : <input type="text" name="delivery_time_id_{{ $count_value }}" id="delivery_time_id_{{ $count_value }}" value="0" autocomplete="off">, 

  deliverytime : <input type="text" name="deliverytime_{{ $count_value }}" id="deliverytime_{{ $count_value }}" value="0" autocomplete="off">
  <!-- Delivery section fields end -->

</div>

<script type="text/javascript">
$(document).ready(function(){
  $('.selectpicker').selectpicker('render').selectpicker('refresh');

  //For Product Attribute
  $(document).off('click', '.pro_attr');
  $(document).on('click', '.pro_attr', function(){
    var clicked_attr_id     =  $(this).val();
    var clicked_count_value = $(this).attr('data-currentcount');
    
    $('#product_attr_id_'+clicked_count_value).val(clicked_attr_id);
  });

});

/* For Product Extra Addon Start */
//Product Extra ( Check and uncheck ) section
var pro_extra_array_{{ $count_value }} = [];
function itemExistsChecker(pro_extra_id) {
  var len = pro_extra_array_{{ $count_value }}.length;
  if (len > 0) {
    for (var i = 0; i < len; i++) {
      if (pro_extra_array_{{ $count_value }}[i] == pro_extra_id) {
        return true;
      }
    }
  }
  pro_extra_array_{{ $count_value }}.push(pro_extra_id);
}

//For Product Attribute
$(document).off('click', '.pro_extra');
$(document).on('click', '.pro_extra', function(){
  $('.pro_extra').each(function() {
    var pro_extra_id                  = $(this).val();
    var pro_extra_clicked_count_value = $(this).attr('data-extraaddoncurrentcount');      

    $(this).change(function() {
      //localStorage.setItem(pro_extra_id, $(this).is(':checked'));
      if ($(this).is(':checked')) {
        itemExistsChecker(pro_extra_id);
      }
      else {
        var cboxValueIndex = pro_extra_array_{{ $count_value }}.indexOf(pro_extra_id);
        if (cboxValueIndex >= 0) {
          pro_extra_array_{{ $count_value }}.splice( cboxValueIndex, 1 );
        }
      }
      //console.log(pro_extra_array);
      $('#product_extra_id_'+pro_extra_clicked_count_value).val(pro_extra_array_{{ $count_value }});
    });
  });
});
/* For Product Extra Addon End */

/* For Product Gift Addon Start */
//Gift Addon ( Check and uncheck ) section
var gift_addon_array_{{ $count_value }} = [];
function existanceChecker(gift_addon_id) {
  var array_length = gift_addon_array_{{ $count_value }}.length;
  if( array_length > 0 ) {
    for ( var k = 0; k < array_length; k++ ) {
      if ( gift_addon_array_{{ $count_value }}[k] == gift_addon_id ) {
        return true;
      }
    }
  }
  gift_addon_array_{{ $count_value }}.push(gift_addon_id);
}

$(document).off('click', '.giftaddon');
$(document).on('click', '.giftaddon', function(){
  $('.giftaddon').each(function() {
    var gift_addon_id                = $(this).val();
    var pro_gift_clicked_count_value = $(this).attr('data-giftaddoncurrentcount');

    $(this).change(function() {
      //localStorage.setItem(gift_addon_id, $(this).is(':checked'));
      if ($(this).is(':checked')) {
        existanceChecker(gift_addon_id);
      }
      else {
        var cboxValueIndex_gift = gift_addon_array_{{ $count_value }}.indexOf(gift_addon_id);
        if (cboxValueIndex_gift >= 0) {
          gift_addon_array_{{ $count_value }}.splice( cboxValueIndex_gift, 1 );
        }
      }
      //console.log(pro_extra_array);
      $('#giftaddon_ids_'+pro_gift_clicked_count_value).val(gift_addon_array_{{ $count_value }});
    });
  });
});
/* For Product Gift Addon End */
</script>