@php
$session_pincode = null;
if( Session::has('Admin.delivery_pin_code') ) {
  $session_pincode = Session::get('Admin.delivery_pin_code');
}
@endphp

<div id="product_list_{{ $counter_value }}" style="border: 1px solid #000; padding: 10px; margin-bottom: 20px;">

	<div class="form-group">
	    <label for="product_class"><?php echo 'Product '.$counter_value;?></label>

	    <label for="product_class" style="float: right; cursor: pointer;">
		    <a onclick="removeDiv({{ $counter_value }})">
				<i class="fas fa-trash-alt"></i>
			</a>
		</label>
		
	    <select name="product_id_{{ $counter_value }}" id="product_id_{{ $counter_value }}" class="form-control productid_{{ $counter_value }} productclass selectpicker" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" required>
	      <option value="" data-currentcount="{{ $counter_value }}">Select</option>
	    @php foreach( $product_list as $product ){ @endphp
	      <option value="{{ $product->id }}" data-currentcount="{{ $counter_value }}">{{ $product->product_name.' ('.$product->sku.')' }}</option>
	    @php } @endphp
	    </select>
	</div>

	<?php /*<div class="form-group">
        <label for="title">{{ __('Pincode') }}<span class="text-danger">&#042;</span></label>
        {!! Form::text('pincode', $session_pincode, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Pincode'), 'id' => 'area_city_pin_'.$counter_value, 'readonly' => true, 'autocomplete' => 'off')) !!}
        @if ($errors->has('pincode'))
          <span class="error">
            {{ $errors->first('pincode') }}
          </span>
        @endif
  	</div>*/?>

  	{!! Form::hidden('pincode', $session_pincode, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Pincode'), 'id' => 'area_city_pin_'.$counter_value, 'readonly' => true, 'autocomplete' => 'off')) !!}

  	<span id="pncod_{{ $counter_value }}"></span>

  	<div class="product_whole_record" id="details_{{ $counter_value }}"></div>  	
  	

	<script type="text/javascript">
	$(document).ready(function(){
		$('.selectpicker').selectpicker('render').selectpicker('refresh');

		$(document).off('change', 'select.productclass');
		$(document).on('change', 'select.productclass', function(){
      		var product_id = $(this).val();
      		var currentcount = $(this).find(':selected').attr('data-currentcount');
      		//$('#area_city_pin_'+currentcount).val('');
      		//$('#details_'+currentcount).html('');
      		//$('#details_'+currentcount).addclass('loading');

      		//Checking & getting PRODUCT related all details Start
      		if( product_id != '' && currentcount > 0 ){
      			var pincode_value 	 = '{{ $session_pincode }}';
				var count_value   	 = '{{ $counter_value }}';
				var current_currency = '{{ $current_currency }}';

				$.ajax({
	          		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	          		type : 'POST',
	          		url : '{{ route("admin.orders.check-pincode") }}',
	          		data : { product_id : product_id, pincode : pincode_value, count_value : count_value, current_currency : current_currency },
	          		success : function(response) {
	          			response = JSON.parse(response);

	          			$('#details_'+count_value).addClass('loading');

	            		if(response.status == 'available') {
	            			$('#pncod_'+count_value).html('');
	              			
	              			//Getting product respective attribute + extra addon + gift addon
	              			$.ajax({
				          		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				          		type : 'POST',
				          		url : '{{ route("admin.orders.product-attribute-extraaddon-giftaddon") }}',
				          		data : { product_id : product_id, pincode : pincode_value, count_value : count_value, current_currency : current_currency },
				          		success : function(response_details) {
				          			$('#details_'+count_value).html(response_details);
				          		},
				          		error : function(){
				          		}
				      		});

	            		}else{
	              			$('#pncod_'+count_value).html('<span style="color: #ff0000;">'+response.msg+'</span>');
	            		}
	          		},
	          		error : function(){
	          		}
	      		});
				
      		}
      		//Checking & getting PRODUCT related all details End

      	});

	});

	<?php /*
	//on keyup, start the checking
	$('#area_city_pin_{{ $counter_value }}').on('keyup', function (e) {
		var pincode_value 	 = $('#area_city_pin_'+{{ $counter_value }}).val();
		var product_id 	  	 = $('#product_id_{{ $counter_value }}').val();
		var count_value   	 = '{{ $counter_value }}';
		var current_currency = '{{ $current_currency }}';

		if( product_id != '' && pincode_value.length > 5 ) {
			$.ajax({
          		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          		type : 'POST',
          		url : '{{ route("admin.orders.check-pincode") }}',
          		data : { product_id : product_id, pincode : pincode_value, count_value : count_value, current_currency : current_currency },
          		success : function(response) {
          			response = JSON.parse(response);
            		if(response.status == 'available') {
            			$('#pncod_'+count_value).html('');
              			
              			//Getting product respective attribute + extra addon + gift addon
              			$.ajax({
			          		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			          		type : 'POST',
			          		url : '{{ route("admin.orders.product-attribute-extraaddon-giftaddon") }}',
			          		data : { product_id : product_id, pincode : pincode_value, count_value : count_value, current_currency : current_currency },
			          		success : function(response_details) {
			          			$('#details_'+count_value).html(response_details);
			          		},
			          		error : function(){
			          		}
			      		});

            		}else{
              			$('#pncod_'+count_value).html('<span style="color: #ff0000;">'+response.msg+'</span>');
            		}
          		},
          		error : function(){
          		}
      		});
    	}
	});
	*/ ?>

	</script>

</div>