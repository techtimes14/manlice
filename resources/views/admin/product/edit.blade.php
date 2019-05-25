@extends('layouts.admin.app')

@section('content')
<script src="{{ asset('js/admin/misc.js') }}"></script>
<script src="{{ asset('js/admin/tinymce.min.js') }}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
</style>
<link rel="stylesheet" href="{{asset('css/admin/selectpicker/bootstrap-select.css')}}">
<script src="{{asset('js/admin/selectpicker/bootstrap-select.js')}}"></script>
<style type="text/css">
.dropdown-menu{font-size: 0.80rem;}
</style>

<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
                  <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
              @endif
          @endforeach

          {!! Form::model($products, ['route' => ['admin.product.edit', base64_encode($products->id)], 'id' => 'productAdd', 'class' => 'cmxform', 'method' => 'PUT', 'novalidate','files' => true] ) !!}
            <h4 class="card-title">{{ __('Update Product') }} <a href="{{ url('/').'/'.$products->slug }}" target="_blank">View in  store</a></h4>
            <fieldset>
              <div class="form-group">
                <label for="title">{{ __('Category') }}<span class="text-danger">&#042;</span></label>
                {{Form::select('categories_id',$category_list,$products->categories_id,array('required','class'=>'form-control selectpicker','multiple'=>'multiple','name'=>'categories_id[]','disabled'=>true, 'data-live-search'=>'true', 'data-live-search-placeholder'=>'Search', 'data-actions-box'=>'true'))}}
                @if ($errors->has('categories_id'))
                  <span class="error">
                    {{ $errors->first('categories_id') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="title">{{ __('Occasion') }}<span class="text-danger">&#042;</span></label>
                {{Form::select('occasions_id',$occasions_list,$products->occasions_id,array('required','class'=>'form-control selectpicker','multiple'=>'multiple','name'=>'occasions_id[]','disabled'=>true, 'data-live-search'=>'true', 'data-live-search-placeholder'=>'Search', 'data-actions-box'=>'true'))}}
                @if ($errors->has('occasions_id'))
                  <span class="error">
                    {{ $errors->first('occasions_id') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="title">{{ __('Product Title') }}<span class="text-danger">&#042;</span></label>
                {!! Form::text('product_name', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Title'), 'id' => 'title')) !!}
                @if ($errors->has('product_name'))
                  <span class="error">
                    {{ $errors->first('product_name') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="description">{{ __('Product Description') }}<span class="text-danger">&#042;</span></label>
                {!! Form::textarea('description', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Description'), 'id' => 'description')) !!}
                @if ($errors->has('description'))
                  <span class="error">
                    {{ $errors->first('description') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="delivery_information">{{ __('Delivery Information') }}</label>
                {!! Form::textarea('delivery_information', null, array('class'=>'form-control', 'placeholder' => __('Enter Delivery Information'), 'id' => 'delivery_information')) !!}
                @if ($errors->has('delivery_information'))
                  <span class="error">
                    {{ $errors->first('delivery_information') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="care_instruction">{{ __('Care Instructions') }}</label>
                {!! Form::textarea('care_instruction', null, array('class'=>'form-control', 'placeholder' => __('Enter Delivery Information'), 'id' => 'care_instruction')) !!}
                @if ($errors->has('care_instruction'))
                  <span class="error">
                    {{ $errors->first('care_instruction') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="related-products">{{ __('Extra Addon') }}</label>
                <select class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" id="product_extras_id" name="product_extras_id[]">
                <?php
                foreach ($product_extra_addon_groups as $key => $val) {
                ?>
                  <option value="<?php echo $key;?>" <?php if( in_array($key, $assign_product_extra) ){ echo 'selected="selected"'; }?>><?php echo $val;?></option>
                <?php
                }
                ?>
                  </select>
                @if ($errors->has('product_extras_id'))
                  <span class="error">
                    {{ $errors->first('product_extras_id') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <div class="row">
                  <label for="attribute" class="col-sm-12 col-form-label">{{ __('Has Attribute?') }}</label>
                  <div class="col-sm-1">
                    <div class="form-radio">
                      <label class="form-check-label">
                        {!! Form::radio('has_attribute', 'YES', null, array('checked', 'class'=>'form-check-input has_attribute', 'id' => 'attr_1')) !!}
                        Yes
                      <i class="input-helper"></i></label>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-radio">
                      <label class="form-check-label">
                        {!! Form::radio('has_attribute', 'NO', null, array('class'=>'form-check-input has_attribute', 'id' => 'attr_2')) !!}
                        No
                      <i class="input-helper"></i></label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group deleteAttrMessage">
              </div>

              	<?php
                	//dd( $products->product_attribute_without_condition );
            	?>

              <div class="form-group has_attribute_show">
                <label for="create_attribute">{{ __('Create Attribute') }}<span class="text-danger">&#042;</span></label>

                <input type="hidden" id="attrib_count" value="">
                
              	<ul class="addField" id="sortable">
                @if(count($products->product_attribute_without_condition))  	
                    @foreach($products->product_attribute_without_condition as $attribute)
                      	<li id="attr{{$attribute->id}}" style="height:55px;" class="ui-state-default">
                      		<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                      		<div class="row">
                        		<div class="col-sm-6">
                          			{!! Form::hidden('attr_id[]', $attribute->id, array('required', 'class'=>'form-control')) !!}
                          			{!! Form::text('attr_title[]', $attribute->title, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Attribute Title'), 'id' => 'attr_title0')) !!}
                      				@if ($errors->has('attr_title'))
                            			<span class="error">
                              				{{ $errors->first('attr_title') }}
                            			</span>
                          			@endif
                        		</div>
                        		<div class="col-sm-3">
                          			{!! Form::number('attr_price', $attribute->price, array('required','class'=>'form-control', 'placeholder' => __('Enter Price'),'name'=>'attr_price[]', 'min' => 0, 'id' => 'attr_price0')) !!}
                          			@if ($errors->has('attr_price'))
                            		<span class="error">
                              			{{ $errors->first('attr_price') }}
                            		</span>
                          			@endif
                        		</div>

                        		<div class="col-sm-3">                          
                          			<?php /*<a class="deleteExistAttr" href="javascript: void(0);" data-id="{{base64_encode($attribute->id)}}" data-pid="{{$products->id}}" data-name="attr{{$attribute->id}}"><i class="fas fa-trash-alt"></i></a> */ ?>

                        			@if($attribute->is_block == 'Y')
										<a id="attr_{{$attribute->id}}" class="changeExistAttrStatus" href="javascript: void(0);" data-id="{{base64_encode($attribute->id)}}" data-pid="{{$products->id}}" data-attrstat="N">
											<i class="fas fa-lock" title="Click to unblock"></i>
										</a>
									@elseif($attribute->is_block == 'N')
										<a id="attr_{{$attribute->id}}" class="changeExistAttrStatus" href="javascript: void(0);" data-id="{{base64_encode($attribute->id)}}" data-pid="{{$products->id}}" data-attrstat="Y">
											<i class="fas fa-unlock" title="Click to block"></i>
										</a>
									@endif
                        		</div>
                      		</div>
                      	</li>
                    @endforeach
                @endif
                </ul>

                <div class="col-sm-2" style="text-align: left; margin-top: 5px; margin-left: 0; padding-left: 0;">
                  <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add More Attribute" />
                </div>
              </div>

              <div class="form-group no_attribute_show" style="display: none;">
                <label for="price">{{ __('Product Price') }}<span class="text-danger">&#042;</span></label>
                {!! Form::number('price', null, array('class'=>'form-control', 'placeholder' => __('Enter Product Price'), 'id' => 'price', 'min' => 0)) !!}
                @if ($errors->has('price'))
                  <span class="error">
                    {{ $errors->first('price') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="special_delivery">{{ __('Special Delivery') }}</label>
                {{Form::select('special_delivery', $delivery_options, $products->special_delivery, array('placeholder'=>'Select', 'class'=>'form-control selectpicker', 'name'=>'special_delivery', 'data-live-search'=>'true', 'data-live-search-placeholder' => 'Search', 'data-actions-box' => 'true'))}}
                @if ($errors->has('special_delivery'))
                  <span class="error">
                    {{ $errors->first('special_delivery') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="tax_class">{{ __('Tax Class') }}</label>
                <select name="tax_class" id="tax_class" class="form-control selectpicker" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
                  <option value="">Select</option>
                @php foreach( $tax_classes as $class ){ @endphp
                  <option value="{{ $class->id }}" <?php if( $products->tax_class == $class->id )echo 'selected';?>>{{ $class->title }}</option>
                @php } @endphp
                </select>
                @if ($errors->has('tax_class'))
                  <span class="error">
                    {{ $errors->first('tax_class') }}
                  </span>
                @endif
              </div>

              <?php
              $selected_array = [];
              if ($products->shipping_method) {
                foreach ($products->shipping_method as $key => $val) {
                  $selected_array[] = $val->shipping_method_id;
                }
              }
              ?>

              <div class="form-group">
                <label for="title">{{ __('Shipping Methods') }}<span class="text-danger">&#042;</span></label>
                {{Form::select('shipping_method_id',$shipping_methods,$selected_array,array('required','class'=>'form-control selectpicker','multiple'=>'multiple','name'=>'shipping_methods[]', 'data-live-search'=>'true', 'data-live-search-placeholder'=>'Search', 'data-actions-box'=>'true'))}}
                @if ($errors->has('shipping_methods'))
                  <span class="error">
                    {{ $errors->first('shipping_methods') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="related-products">{{ __('Delivery Delay Days') }}<span class="text-danger">&#042;</span></label>
                {!! Form::number('delivery_delay_days', null, array('required','class'=>'form-control', 'placeholder' => __('Enter Number of Days'),'name'=>'delivery_delay_days', 'id' => 'delivery_delay_days', 'min' => 0, 'step' => 1, 'onkeypress'=>'return !(event.charCode == 46)', 'oninput'=>'this.value=(parseInt(this.value)||0)')) !!}
                @if ($errors->has('delivery_delay_days'))
                  <span class="error">
                    {{ $errors->first('delivery_delay_days') }}
                  </span>
                @endif
                <?php /*<small>Note: Starting Delivery Date Now: <?php echo date('d F Y', strtotime($products->delivery_delay_days_from)); ?></small>*/?>
              </div>

              <div class="form-group">
                <label for="related-products">{{ __('Related Products') }}<span class="text-danger">&#042;</span></label>
                <select class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" id="product_ids" name="product_ids[]">
                <?php
                foreach ($product_list as $key => $val) {
                ?>
                  <option value="<?php echo $key;?>" <?php if(in_array($key, $product_ids)){echo 'selected="selected"';}?>><?php echo $val;?></option>
                <?php
                }
                ?>
                  </select>
                @if ($errors->has('product_ids'))
                  <span class="error">
                    {{ $errors->first('product_ids') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="related-products">{{ __('Available Cities') }}<span class="text-danger">&#042;</span></label>
                <select class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" required data-actions-box="true" id="city_ids" name="city_ids[]">
                <?php
                foreach ($city_list as $key => $city) {
                ?>
                  <option value="<?php echo $key;?>" <?php if( in_array($key, $city_ids) ){ echo 'selected="selected"'; }?>><?php echo $city;?></option>
                <?php
                }
                ?>
                  </select>
                @if ($errors->has('city_ids'))
                  <span class="error">
                    {{ $errors->first('city_ids') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="related-products">{{ __('Gift Addon Group') }}<span class="text-danger">&#042;</span></label>
                <select class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" required data-actions-box="true" id="gift_addon_group_ids" name="gift_addon_group_ids[]">
                <?php
                foreach ($gift_addon_group_list as $key => $val) {
                ?>
                  <option value="<?php echo $key;?>" <?php if( in_array($key, $gift_addon_group_ids) )echo 'selected="selected"';?>><?php echo $val;?></option>
                <?php
                }
                ?>
                </select>
              @if ($errors->has('gift_addon_group_ids'))
                <span class="error">
                  {{ $errors->first('gift_addon_group_ids') }}
                </span>
              @endif
              </div>

              <div class="form-group">
                <label for="related-products">{{ __('Restricted Pincode') }}</label>
                <select class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" id="pincode_group_ids" name="pincode_group_ids[]">
                <?php
                foreach ($pincode_group_list as $key => $val) {
                ?>
                  <option value="<?php echo $key;?>" <?php if( in_array($key, $pincode_group_ids) )echo 'selected="selected"';?>><?php echo $val;?></option>
                <?php
                }
                ?>
                </select>
              </div>

              <div class="form-group">
                <label for="alt_key">{{ __('Alt Keyword') }}<span class="text-danger">&#042;</span></label>
                {!! Form::text('alt_key', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Alt Keyword'), 'id' => 'alt_key')) !!}
                @if ($errors->has('alt_key'))
                  <span class="error">
                    {{ $errors->first('alt_key') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="meta_title">{{ __('Meta Title') }}<span class="text-danger">&#042;</span></label>
                {!! Form::text('meta_title', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Meta Title'), 'id' => 'meta_title')) !!}
                @if ($errors->has('meta_title'))
                  <span class="error">
                    {{ $errors->first('meta_title') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="meta_keyword">{{ __('Meta Keyword') }}<span class="text-danger">&#042;</span>
                <br><small><i>Short Codes : [country], [city]</i></small></label>
                {!! Form::textarea('meta_keyword', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Meta Keyword'), 'id' => 'meta_keyword')) !!}
                @if ($errors->has('meta_keyword'))
                  <span class="error">
                    {{ $errors->first('meta_keyword') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="meta_description">{{ __('Meta Description') }}<span class="text-danger">&#042;</span>
                <br><small><i>Short Codes : [country], [city]</i></small></label>
                {!! Form::textarea('meta_description', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Meta Description'), 'id' => 'meta_description')) !!}
                @if ($errors->has('meta_description'))
                  <span class="error">
                    {{ $errors->first('meta_description') }}
                  </span>
                @endif
              </div>

              <input class="btn btn-primary" type="submit" value="Update">
              <a class="btn btn-info" href="{{ route('admin.product.list') }}">Cancel</a>
            </fieldset>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
<div id="image_crop" class="modal modal-bg-black fade add_team1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title common common1">
                    Profile Image
                </h2>
            </div>
            <div class="modal-body">
                <img src="" alt="noimage" id="image-preview">
                <button type="button" id="image-button" class="submit_btn crop_button" style="display: none;">Crop</button>
                 <button type="button" class="submit_btn crop_button cancel_crop">Cancel</button>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){

    $( "#sortable" ).sortable();

    $('.deleteAttrMessage').hide();

    //======= delete product attribute ==========//
    $(".changeExistAttrStatus").on('click', function() {
        if(confirm("Are you sure you want to change the status?")){
            var id 	 			 = $(this).attr('id');
            var attribute_id 	 = $(this).attr('data-id');
            var attribute_status = $(this).attr('data-attrstat');
            var product_id 		 = $(this).attr('data-pid');

            //var row_id 		 = $(this).attr('data-name');

            //statusattr_

            var ajax_url = '{{ route("admin.product.change_status_product_attribute") }}';
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: ajax_url,
                method: 'POST',
                data: {
                    attribute_id: attribute_id,
                    product_id: product_id,
                    attribute_status: attribute_status
                },
                success: function(data){
                    if(data == 1){
                    	if(attribute_status == 'Y') {
                    		$('#'+id).html('<i class="fas fa-lock" title="Click to unblock"></i>');
                    		$('#'+id).attr('data-attrstat','N');
                    	}else if(attribute_status == 'N') {
                    		$('#'+id).html('<i class="fas fa-unlock" title="Click to block"></i>');
                    		$('#'+id).attr('data-attrstat','Y');
                    	}

                    	$('.deleteAttrMessage').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Attribute status updated successfully.</div>');
                      	$('.deleteAttrMessage').show();
                    }
                    else if(data == 2){
                      	$('.deleteAttrMessage').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Minimum one attribute must be active.</div>');
                      	$('.deleteAttrMessage').show();
                    }
                    else{
                      	$('.deleteAttrMessage').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Some error occured, please try again later.</div>');
                      	$('.deleteAttrMessage').show();
                    }
                    setTimeout(function(){ $('.deleteAttrMessage').hide(); }, 4000);
                }
            });
        }
    });


    //======= delete product attribute ==========//
    $(".deleteExistAttr").on('click', function() {
        if(confirm("Are you sure you want to delete product attribute?")){
            var attribute_id = $(this).attr('data-id');
            var product_id = $(this).attr('data-pid');
            var row_id = $(this).attr('data-name');
            var ajax_url = '{{ route("admin.product.delete_product_attribute") }}';
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: ajax_url,
                method: 'POST',
                data: {
                    attribute_id: attribute_id,
                    product_id:product_id
                },
                success: function(data){
                    if(data == 1){
                      $('#'+row_id).remove();
                      counter--;
                    }else if(data == 2){
                      $('.deleteAttrMessage').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Danger!</strong> Minimum one attribute required.</div>');
                      $('.deleteAttrMessage').show();
                    }else{
                      $('.deleteAttrMessage').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Danger!</strong> Error in processing request for update default image.</div>');
                      $('.deleteAttrMessage').show();
                    }
                    setTimeout(function(){ $('.deleteAttrMessage').hide(); }, 4000);
                }
            });
        }
    });



    /* Add more functionality */
    var counter = <?php echo count($products->product_attribute_without_condition); ?>;
    $('#attrib_count').val(counter);
    $("#addrow").on("click", function () {
        if(counter < 5){
          counter++;
          $('#attrib_count').val(counter);
          var cols = '';
          var newRow = $('<li style="height:55px;" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>');

          cols += '<div class="row"><div class="col-sm-6"><input class="form-control" name="attr_id[]" type="hidden" ><input required class="form-control" placeholder="Enter Attribute Title" id="attr_title'+counter+'" name="attr_title[]" type="text"></div>';
          cols += '<div class="col-sm-3"><input required="" min="0" class="form-control" placeholder="Enter Price" id="attr_price'+counter+'" name="attr_price[]" type="number"></div><div class="col-sm-3"><a class="deleteRow" href="javascript: void(0);"><i class="fas fa-trash-alt ibtnDel"></i></a></div></div></div><li>';

          newRow.append(cols);
          $(".addField").append(newRow);
        }else{
          alert("You can't add more than 5 attributes.");
        }
    });

    $(".row").on("click", ".ibtnDel", function (event) {
        $(this).closest("li").remove();
        counter--;
        $('#attrib_count').val(counter);
    });

});

$.validator.setDefaults({
        submitHandler: function(form) {
            form.submit();
        }
});
$(function() {
    // validate the comment form when it is submitted
    $("#productAdd").validate({
      ignore: [],
      // errorPlacement: function(label, element) {
      //  label.addClass('mt-2 text-danger');
      //  label.insertAfter(element);
      // },
      // highlight: function(element, errorClass) {
      //  $(element).parents('.form-group').addClass('has-danger')
      //  $(element).addClass('form-control-danger')
      // }
    });
});
</script>

<script type="text/javascript">
    if ($("#description").length) {
      tinymce.init({
          selector: '#description',
          height: 200,
          theme: 'modern',
          plugins: [
              'advlist autolink lists link image charmap print preview hr anchor pagebreak',
              'searchreplace wordcount visualblocks visualchars code fullscreen',
              'insertdatetime media nonbreaking save table contextmenu directionality',
              'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
          ],
          toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
          image_advtab: true,
          /*templates: [{
                  title: 'Test template 1',
                  content: 'Test 1'
              },
              {
                  title: 'Test template 2',
                  content: 'Test 2'
              }
          ],*/
          content_css: [],
          init_instance_callback: function (editor) {
            editor.on('keydown', function (e) {
              $('#content-error').hide();
            });
          }
      });
    }

    if ($("#delivery_information").length) {
      tinymce.init({
          selector: '#delivery_information',
          height: 150,
          theme: 'modern',
          plugins: [
              'advlist autolink lists link image charmap print preview hr anchor pagebreak',
              'searchreplace wordcount visualblocks visualchars code fullscreen',
              'insertdatetime media nonbreaking save table contextmenu directionality',
              'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
          ],
          toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
          image_advtab: true,
          /*templates: [{
                  title: 'Test template 1',
                  content: 'Test 1'
              },
              {
                  title: 'Test template 2',
                  content: 'Test 2'
              }
          ],*/
          content_css: [],
          init_instance_callback: function (editor) {
            editor.on('keydown', function (e) {
              $('#content-error').hide();
            });
          }
      });
    }

    if ($("#care_instruction").length) {
      tinymce.init({
          selector: '#care_instruction',
          height: 150,
          theme: 'modern',
          plugins: [
              'advlist autolink lists link image charmap print preview hr anchor pagebreak',
              'searchreplace wordcount visualblocks visualchars code fullscreen',
              'insertdatetime media nonbreaking save table contextmenu directionality',
              'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
          ],
          toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
          image_advtab: true,
          /*templates: [{
                  title: 'Test template 1',
                  content: 'Test 1'
              },
              {
                  title: 'Test template 2',
                  content: 'Test 2'
              }
          ],*/
          content_css: [],
          init_instance_callback: function (editor) {
            editor.on('keydown', function (e) {
              $('#content-error').hide();
            });
          }
      });
    }

    $(document).ready(function(){
        $(document).on('change', '.has_attribute', function(){
            if($('.has_attribute:checked').val() == 'YES'){
              	$('.has_attribute_show').slideDown();
              	$('.no_attribute_show').slideUp();
              	$("input[id*=attr_price]").attr("required",true);
              	$("input[id*=attr_title]").attr("required",true);
              	$("input[id*=price]").attr("required",false);

              	var attrib_count = $('#attrib_count').val();
              	if( attrib_count == 0 ) {
              		$("#addrow").trigger("click");
              		$('#attrib_count').val(1);
              	}
            }else{
              	$("input[id*=price]").attr("required",true);
              	$("input[id*=attr_price]").attr("required",false);
              	$("input[id*=attr_title]").attr("required",false);
              	$('.has_attribute_show').slideUp();
              	$('.no_attribute_show').slideDown();
            }
        });
        $('.has_attribute').trigger('change');

        //Extra addon selection maximum limit
        $('#product_extras_id').selectpicker({
          maxOptions:2,
          actionsBox: false,
        });

        //Extra addon selection maximum limit
        $('#product_ids').selectpicker({
          maxOptions:8,
          actionsBox: false,
        });

    });
</script>
@endsection
