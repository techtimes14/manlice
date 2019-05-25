@extends('layouts.admin.app')

@section('content')
<script src="{{ asset('js/admin/misc.js') }}"></script>
<script src="{{ asset('js/admin/tinymce.min.js') }}"></script>

<link rel="stylesheet" href="{{asset('css/admin/selectpicker/bootstrap-select.css')}}">
<script src="{{asset('js/admin/selectpicker/bootstrap-select.js')}}"></script>

<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<style type="text/css">
.dropdown-menu{font-size: 0.80rem;}
.error{font-weight: normal;}
#pincode_cross{width: 15px; position: absolute; margin-top: 31px; margin-left: 10px;}
.extra_gap{padding-left: 25px;}
</style>
<?php
$current_currency = 3;
if( isset($_GET['currency']) && $_GET['currency'] != '' ) {
  $current_currency = $_GET['currency'];
}
?>

<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' .$msg) }}</h4>
            @endif
          @endforeach
					{!! Form::model($order, ['route' => 'admin.orders.add', 'id' => 'orderAdd', 'class' => 'cmxform', 'method' => 'PUT', 'novalidate','files' => true] ) !!}
						<h4 class="card-title">{{ __('Create Order') }}</h4>
						<fieldset>

              <div class="form-group">
                <label for="title">{{ __('User') }}<span class="text-danger">&#042;</span></label>
                {{ Form::select('user_id',$list_users,null,array('required','class'=>'form-control selectpicker','name'=>'user_id', 'data-live-search'=>'true', 'data-live-search-placeholder'=>'Search', 'data-actions-box'=>'true')) }}
                @if ($errors->has('user_id'))
                  <span class="error">
                    {{ $errors->first('user_id') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="title">{{ __('Currency') }}<span class="text-danger">&#042;</span></label>
                <select name="currency_id" class="form-control selectpicker currencyclass" data-live-search='true' data-live-search-placeholder='Search' data-actions-box='true'>
              <?php
              if( $list_currency != null ){
                foreach ($list_currency as $key => $value) {
              ?>
                  <option value="{{ $key }}" <?php if($key == $current_currency)echo 'selected';?>>{{ $value }}</option>
              <?php
                }
              }
              ?>
                </select>
                @if ($errors->has('currency_id'))
                  <span class="error">
                    {{ $errors->first('currency_id') }}
                  </span>
                @endif
              </div>

              @php
              $session_pincode = null;
              $display = 'display: none;';
              $newclass = '';
              $validity = 0;
              if( Session::has('Admin.delivery_pin_code') ) {
                  $session_pincode = Session::get('Admin.delivery_pin_code');
                  $display = 'display: block;';
                  $validity = 1;
                  $newclass = 'extra_gap';
              }
              @endphp

              <a href="javascript:void(0);" id="pincode_cross" style="{{ $display }}">
                  <i class="fa fa-times" aria-hidden="true"></i>
              </a>

              <div class="form-group">
                <label for="title">{{ __('Pincode') }}<span class="text-danger">&#042;</span></label>
                {!! Form::text('add_to_cart_pincode', $session_pincode, array('required', 'class'=>'form-control '.$newclass, 'placeholder' => __('Enter Pincode'), 'id' => 'add_to_cart_pincode', 'data-validity' => $validity, 'autocomplete' => 'off')) !!}
                @if ($errors->has('add_to_cart_pincode'))
                  <span class="error">
                    {{ $errors->first('add_to_cart_pincode') }}
                  </span>
                @endif
                <span id="pincode_error"></span>
              </div>
              

              <?php /*
              <div class="form-group">
                <label for="title">{{ __('Pincode') }}<span class="text-danger">&#042;</span></label>
                {!! Form::text('pincode', 700071, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Pincode'), 'id' => 'area_city_pin', 'autocomplete' => 'off')) !!}
                @if ($errors->has('pincode'))
                  <span class="error">
                    {{ $errors->first('pincode') }}
                  </span>
                @endif
              </div>
              */ ?>
              

              <!---------------------------- Add Item Section ---------------------------->
              <div id="addField">

              </div>


              <div class="form-group" id="add_item_div_section" style="display: block;">
                <a id="add_new_row" class="btn btn-info" href="javascript: void(0);">Add Product(s)</a>
              </div>
              <!---------------------------- Add Item Section ---------------------------->


							<input class="btn btn-primary" type="submit" value="Create">
							<a class="btn btn-info" href="{{ route('admin.orders.list') }}">Cancel</a>
						</fieldset>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
/************************** Set & Remove Delivery Pincode To Admin Session ***********************/
var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 1 second for example
var $input = $('#add_to_cart_pincode');

//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

//on keydown, clear the countdown
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});
//user is "finished typing," do something
function doneTyping() {
  if($input.val() !== ''){
    var pincode_value = $.trim($input.val());
    if(pincode_value.length > 5) {
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type : 'POST',
        url : '{{ route("admin.orders.add-pincode-to-session") }}',
        data : { pincode : pincode_value },
        success : function(response) {
          response = JSON.parse(response);
          if(response.type == 'success'){
            $('#add_to_cart_pincode').data('validity',1);
            $('#add_to_cart_pincode').animate({'padding-left': '25px'});
            $('#pincode_cross').show(500);
            $('#pincode_error').html('');
            $('#add_item_div_section').show(500);
          }else{
            $('#add_to_cart_pincode').data('validity',0);
            $('#pincode_cross').hide(500);
            $('#add_to_cart_pincode').animate({'padding-left': '12px'});
            $('#addField').fadeOut(500, function(){ $(this).remove();});
            $('#pincode_error').html("<span class='text-danger clearfix'>This pincode doesn't exist in our database.</span>");
            $('#add_item_div_section').hide(500);
          }
        }
      });
    }else{
      $('#pincode_error').html('');
    }
  }
}

//Remove pincode from session
$('#pincode_cross').on('click', function() {
  //$('#delivery_details').addClass('loading');
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: 'POST',
    url: '{{ route("admin.orders.remove-pincode-from-session") }}',
    data: {},
    success: function(response_data) {
      response_data = JSON.parse(response_data);
      if(response_data.type == 'success'){
        $('#add_to_cart_pincode').data('validity',0);
        $('#pincode_cross').hide(500);
        $('#add_to_cart_pincode').val('');
        $('#add_to_cart_pincode').animate({'padding-left': '12px'});
        $('#addField').fadeOut(500, function(){ $(this).remove();});
        //$('#add_to_cart_pincode').removeClass('extra_gap').fadeIn(1000);
      }
    }
  });
});
/************************** Set & Remove Delivery Pincode To Admin Session ***********************/

$(document).ready(function(){
  $(".row").on("click", ".ibtnDel", function (event) {
      $(this).closest(".row").remove();       
      counter--;
  });

  $( ".currencyclass" ).change(function() {
    var current_url   = '{{ url()->current() }}';
    var currency_val  = $(this).val();
    if( currency_val != '' ){
      window.location.href = current_url+'?currency='+currency_val
    }
  });

  /* Add more functionality */
  var counter = 0;
  $('#add_new_row').click(function(){
    var pin_validity = $('#add_to_cart_pincode').data('validity');
    if(pin_validity > 0) {
      counter++;
      var currency_id      = $('.currencyid').val();
      var current_currency = '{{ $current_currency }}';
      if( currency_id != '' ) {
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          type : 'POST',
          url : '{{ route("admin.orders.add-product-section") }}',
          data : { counter_value : counter, current_currency : current_currency },
          success : function(response) {
            $('#addField').slideDown("slow").append(response);
          },
          error : function(){
          }
        });
      }
    }else{
      $('#orderAdd').trigger('submit');
    }
  });
});

function removeDiv(divid){
  $('#product_list_'+divid).slideUp("slow", function() { $(this).remove();});
}


$(function() {
  // validate the comment form when it is submitted
  $("#orderAdd").validate({
  	ignore: [],
		// errorPlacement: function(label, element) {
		// 	label.addClass('mt-2 text-danger');
		// 	label.insertAfter(element);
		// },
		// highlight: function(element, errorClass) {
		// 	$(element).parents('.form-group').addClass('has-danger')
		// 	$(element).addClass('form-control-danger')
		// }
	});
});
</script>

@endsection