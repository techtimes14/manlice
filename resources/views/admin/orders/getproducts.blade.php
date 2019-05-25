<div id="product_list_{{ $counter_value }}" style="border: 1px solid #000; padding: 10px; margin-bottom: 20px;">

	<div class="form-group">
	    <label for="product_class">{{ __('Product '.$counter_value) }}</label>

	    <select name="product_id_{{ $counter_value }}" id="product_id_{{ $counter_value }}" class="form-control productid_{{ $counter_value }} selectpicker" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
	      <option value="">Select</option>
	    @php foreach( $product_list as $product ){ @endphp
	      <option value="{{ $product->id }}">{{ $product->product_name.' ('.$product->sku.')' }}</option>
	    @php } @endphp
	    </select>

	    @if ($errors->has('product'))
	      	<span class="error">
	        	{{ $errors->first('product') }}
	      	</span>
	    @endif
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
		$('.selectpicker').selectpicker('render').selectpicker('refresh');
	});

	$('.productid_{{ $counter_value }}').change(function (e) {
	    var product_id 		= $('#product_id_{{ $counter_value }}').val();
	    var counter_value 	= {{ $counter_value }};
	    
	    $.ajax({
        	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        	type : 'POST',
        	url : '{{ route("admin.orders.get-product-attribute-price") }}',
        	data : { product_id : product_id, counter_value : counter_value },
    		success : function(response) {
          		$('#addField').append(response);
          		//$('#product_list').html();
        	},
        	error : function(){
        	}
      	});
	});
	</script>

</div>