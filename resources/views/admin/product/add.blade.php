@extends('layouts.admin.app')

@section('content')
<script src="{{ asset('js/admin/misc.js') }}"></script>
<script src="{{ asset('js/admin/tinymce.min.js') }}"></script>

<link rel="stylesheet" href="{{asset('css/admin/selectpicker/bootstrap-select.css')}}">
<script src="{{asset('js/admin/selectpicker/bootstrap-select.js')}}"></script>
<style type="text/css">
.dropdown-menu{font-size: 0.80rem;}
.error{font-weight: normal;}
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
					{!! Form::model($products, ['route' => 'admin.product.add', 'id' => 'productAdd', 'class' => 'cmxform', 'method' => 'PUT', 'novalidate','files' => true] ) !!}
						<h4 class="card-title">{{ __('Create Product') }}</h4>
						<fieldset>
              <!-- <div class="form-group">
                <label for="title">{{ __('Select Option') }}<span class="text-danger">&#042;</span></label>
                {{Form::select('option',[''=>'Select Option','1' => 'Category', '2' => 'Occasion'],null,array('required','class'=>'form-control selectpicker','name'=>'option','id'=>'option'))}}
              </div> -->
              <div style="color: red; display:none;" id="error_msg_cat"><span class="text-danger">&#042;</span>Please select product category or occasion</div>
              <div class="form-group" >
                <label for="title">{{ __('Category') }}</label>
                {{Form::select('categories_id',$category_list->toArray(),null,array('class'=>'form-control selectpicker','name'=>'categories_id[]','multiple'=>'multiple', 'data-live-search'=>'true', 'data-live-search-placeholder'=>'Search', 'data-actions-box'=>'true','id'=>'cat_id'))}}
                @if ($errors->has('categories_id'))
                  <span class="error">
                    {{ $errors->first('categories_id') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="title">{{ __('Occasion') }}</label>
                {{Form::select('occasions_id', $occasions_list->toArray(),null,array('class'=>'form-control selectpicker','name'=>'occasions_id[]','multiple'=>'multiple', 'data-live-search'=>'true', 'data-live-search-placeholder'=>'Search', 'data-actions-box'=>'true','id'=>'occation_id'))}}
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
                  <option value="<?php echo $key;?>"><?php echo $val;?></option>
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

              <div class="form-group has_attribute_show">
                <label for="create_attribute">{{ __('Create Attribute') }}<span class="text-danger">&#042;</span></label>
                <div class="addField">
                  <div class="row">
                    <div class="col-sm-6">
                      {!! Form::text('attr_title[0]', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Attribute Title'), 'id' => 'attr_title0')) !!}
                      @if ($errors->has('attr_title'))
                        <span class="error">
                          {{ $errors->first('attr_title') }}
                        </span>
                      @endif
                    </div>
                    <div class="col-sm-3">
                      {!! Form::number('attr_price', null, array('required','class'=>'form-control', 'placeholder' => __('Enter Price'),'name'=>'attr_price[]', 'id' => 'attr_price0', 'min' => 0)) !!}
                      @if ($errors->has('attr_price'))
                        <span class="error">
                          {{ $errors->first('attr_price') }}
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="col-sm-2" style="text-align: left; margin-top: 5px; margin-left: 0; padding-left: 0;">
                  <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add More Attribute" />
                </div>
              </div>

              <?php /*
              <div class="form-group has_attribute_show">
                <label for="create_attribute">{{ __('Combinations') }}<span class="text-danger">&#042;</span></label>
                <div class="row">
                  <!-- <div class="col-sm-4">
                    {!! Form::text('combination_title[]', null, array('readOnly', 'required', 'class'=>'form-control', 'placeholder' => __('Combination'), 'id' => 'attr_label_1')) !!}
                    @if ($errors->has('attr_label_1'))
                      <span class="error">
                        {{ $errors->first('attr_label_1') }}
                      </span>
                    @endif
                  </div> -->
                  <div class="col-sm-8">
                    {!! Form::number('price[]', null, array('required', 'class'=>'form-control', 'placeholder' => __('Price'), 'id' => 'attribute_title_1')) !!}
                    @if ($errors->has('attribute_title_1'))
                      <span class="error">
                        {{ $errors->first('attribute_title_1') }}
                      </span>
                    @endif
                  </div>
                </div>
              </div> */ ?>

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
                {{Form::select('special_delivery', $delivery_options, null, array('placeholder'=>'Select', 'class'=>'form-control selectpicker', 'name'=>'special_delivery', 'data-live-search'=>'true', 'data-live-search-placeholder' => 'Search', 'data-actions-box' => 'true'))}}
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
                  <option value="{{ $class->id }}">{{ $class->title }}</option>
                @php } @endphp
                </select>
                @if ($errors->has('tax_class'))
                  <span class="error">
                    {{ $errors->first('tax_class') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="title">{{ __('Shipping Methods') }}<span class="text-danger">&#042;</span></label>
                {{Form::select('shipping_method_id',$shipping_methods,null,array('required','class'=>'form-control selectpicker','multiple'=>'multiple','name'=>'shipping_methods[]', 'data-live-search'=>'true', 'data-live-search-placeholder'=>'Search', 'data-actions-box'=>'true'))}}
                @if ($errors->has('shipping_methods'))
                  <span class="error">
                    {{ $errors->first('shipping_methods') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="related-products">{{ __('Delivery Delay Days') }}<span class="text-danger">&#042;</span></label>
                {!! Form::number('delivery_delay_days', 0, array('required','class'=>'form-control', 'placeholder' => __('Enter Number of Days'),'name'=>'delivery_delay_days', 'id' => 'delivery_delay_days', 'min' => 0, 'step' => 1, 'onkeypress'=>'return !(event.charCode == 46)', 'oninput'=>'this.value=(parseInt(this.value)||0)')) !!}
                @if ($errors->has('delivery_delay_days'))
                  <span class="error">
                    {{ $errors->first('delivery_delay_days') }}
                  </span>
                @endif
              </div>

              <div class="form-group">
                <label for="related-products">{{ __('Related Products') }}</label>
                <select class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" id="product_ids" name="product_ids[]">
                <?php
                foreach ($product_list as $key => $val) {
                ?>
                  <option value="<?php echo $key;?>"><?php echo $val;?></option>
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
                <select class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" required data-actions-box="true" id="city_group_ids" name="city_group_ids[]">
                <?php
                foreach ($city_list as $key => $city) {
                ?>
                  <option value="<?php echo $key;?>"><?php echo $city;?></option>
                <?php
                }
                ?>
                </select>
              @if ($errors->has('city_group_ids'))
                <span class="error">
                  {{ $errors->first('city_group_ids') }}
                </span>
              @endif
              </div>

              <div class="form-group">
                <label for="related-products">{{ __('Gift Addon') }}<span class="text-danger">&#042;</span></label>
                <select class="form-control selectpicker" multiple data-live-search="true" data-live-search-placeholder="Search" required data-actions-box="true" id="gift_addon_group_ids" name="gift_addon_group_ids[]">
                <?php
                foreach ($gift_addon_group_list as $key => $val) {
                ?>
                  <option value="<?php echo $key;?>"><?php echo $val;?></option>
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
                  <option value="<?php echo $key;?>"><?php echo $val;?></option>
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

							<input class="btn btn-primary" type="submit" value="Create">
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
    /* Add more functionality */
    var counter = 0;
    $("#addrow").on("click", function () {

        if(counter < 4){
          counter++;
          var cols = '';
          var newRow = $('<div class="row" style="margin-top: 5px;">');

          cols += '<div class="col-sm-6"><input required class="form-control" placeholder="Enter Attribute Title" id="attr_title'+counter+'" name="attr_title['+counter+']" type="text"></div>';
          cols += '<div class="col-sm-3"><input required class="form-control" placeholder="Enter Price" id="attr_price'+counter+'" name="attr_price['+counter+']" type="number" min=0></div><div class="col-sm-3"><a class="deleteRow" href="javascript: void(0);"><i class="fas fa-trash-alt ibtnDel"></i></a></div></div>';

          newRow.append(cols);
          $(".addField").append(newRow);
        }else{
          alert("You can't add more than 5 attributes.");
        }

    });

    $(".row").on("click", ".ibtnDel", function (event) {
        $(this).closest(".row").remove();
        counter--;
    });

});

$.validator.setDefaults({
    submitHandler: function(form) {
        if($('#cat_id').val() == '' && $('#occation_id').val() == '') {
              $('#error_msg_cat').fadeIn('slow');
              var body = $("html, body");
              body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
              });
              setTimeout(function(){ $('#error_msg_cat').fadeOut('slow'); }, 3000);
              return false;
            // show error
        }else{
          form.submit();
        }
    }
});

$.validator.addMethod("duplicate_product", function(value, element) {
    var duplicate = 0;
    var product_name = $('#title').val();
     $.ajax({
             url: '{{route("admin.product.ajaxCheckProductTitle")}}',
             data : {product_name:product_name,"_token": "{{ csrf_token() }}"},
             async: false,
             type: 'POST',
             success: function (data) {
                 duplicate = data;
             }
     });
    return this.optional(element) || duplicate == 1;
}, "The product title you entered is already used");

$(function() {
    // validate the comment form when it is submitted
    $("#productAdd").validate({
    	ignore: [],
      debug: true,
      rules: {
            product_name: {
                required: true,
                duplicate_product: true
            }
        },
        messages: {
            product_name: {
                required: "This field is required.",
                duplicate_product: "The product title you entered is already used"
            }
        },
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
            }else{
              $("input[id*=price]").attr("required",true);
              $("input[id*=attr_price]").attr("required",false);
              $("input[id*=attr_title]").attr("required",false);
              $('.has_attribute_show').slideUp();
              $('.no_attribute_show').slideDown();
            }
        });
        // $('.has_attribute').trigger('change');

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

        $('.has_attribute:checked').trigger('change');

    });
</script>
@endsection
