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
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="title">{{ __('Product Title (English)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::text('product_name', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Title'), 'id' => 'product_name')) !!}
										@if ($errors->has('product_name'))
										<span class="error">
											{{ $errors->first('product_name') }}
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="title">{{ __('Product Title (Chinese)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::text('product_name_zh', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Title'), 'id' => 'product_name_zh')) !!}
										@if ($errors->has('product_name_zh'))
										<span class="error">
											{{ $errors->first('product_name_zh') }}
										</span>
										@endif
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="title">{{ __('Product Title (French)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::text('product_name_fr', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Title'), 'id' => 'product_name_fr')) !!}
										@if ($errors->has('product_name_fr'))
										<span class="error">
											{{ $errors->first('product_name_fr') }}
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="title">{{ __('Product Title (German)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::text('product_name_de', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Title'), 'id' => 'product_name_de')) !!}
										@if ($errors->has('product_name_de'))
										<span class="error">
											{{ $errors->first('product_name_de') }}
										</span>
										@endif
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="title">{{ __('Product Title (Spanish)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::text('product_name_es', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Title'), 'id' => 'product_name_es')) !!}
										@if ($errors->has('product_name_es'))
										<span class="error">
											{{ $errors->first('product_name_es') }}
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="title">{{ __('Product Title (Russian)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::text('product_name_ru', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Title'), 'id' => 'product_name_ru')) !!}
										@if ($errors->has('product_name_ru'))
										<span class="error">
											{{ $errors->first('product_name_ru') }}
										</span>
										@endif
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="title">{{ __('Product Title (Japanese)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::text('product_name_ja', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Title'), 'id' => 'product_name_ja')) !!}
										@if ($errors->has('product_name_ja'))
										<span class="error">
											{{ $errors->first('product_name_ja') }}
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="title">{{ __('Product Title (Korean)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::text('product_name_ko', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Title'), 'id' => 'product_name_ko')) !!}
										@if ($errors->has('product_name_ko'))
										<span class="error">
											{{ $errors->first('product_name_ko') }}
										</span>
										@endif
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="description">{{ __('Product Description (English)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::textarea('description', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Description'), 'id' => 'description')) !!}
										@if ($errors->has('description'))
										<span class="error">
											{{ $errors->first('description') }}
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="description">{{ __('Product Description (Chinese)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::textarea('description_zh', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Description'), 'id' => 'description_zh')) !!}
										@if ($errors->has('description_zh'))
										<span class="error">
											{{ $errors->first('description_zh') }}
										</span>
										@endif
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="description">{{ __('Product Description (French)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::textarea('description_fr', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Description'), 'id' => 'description_fr')) !!}
										@if ($errors->has('description_fr'))
										<span class="error">
											{{ $errors->first('description_fr') }}
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="description">{{ __('Product Description (German)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::textarea('description_de', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Description'), 'id' => 'description_de')) !!}
										@if ($errors->has('description_de'))
										<span class="error">
											{{ $errors->first('description_de') }}
										</span>
										@endif
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="description_ja">{{ __('Product Description (Spanish)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::textarea('description_es', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Description'), 'id' => 'description_es')) !!}
										@if ($errors->has('description_es'))
										<span class="error">
											{{ $errors->first('description_es') }}
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="description">{{ __('Product Description (Russian)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::textarea('description_ru', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Description'), 'id' => 'description_ru')) !!}
										@if ($errors->has('description_ru'))
										<span class="error">
											{{ $errors->first('description_ru') }}
										</span>
										@endif
									</div>
								</div>								
							</div>
							
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="description_ja">{{ __('Product Description (Japanese)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::textarea('description_ja', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Description'), 'id' => 'description_ja')) !!}
										@if ($errors->has('description_ja'))
										<span class="error">
											{{ $errors->first('description_ja') }}
										</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="description">{{ __('Product Description (Korean)') }}<span class="text-danger">&#042;</span></label>
										{!! Form::textarea('description_ko', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Description'), 'id' => 'description_ko')) !!}
										@if ($errors->has('description_ko'))
										<span class="error">
											{{ $errors->first('description_ko') }}
										</span>
										@endif
									</div>
								</div>								
							</div>							
							
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="price">{{ __('Product Price') }}<span class="text-danger">&#042;</span></label>
										{!! Form::number('price', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Product Price'), 'id' => 'price', 'min' => 0)) !!}
										@if ($errors->has('price'))
										  <span class="error">
											{{ $errors->first('price') }}
										  </span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="price">{{ __('Product Special Price') }}<span class="text-danger">&#042;</span></label>
										{!! Form::number('special_price', null, array('class'=>'form-control', 'placeholder' => __('Enter Product Special Price'), 'id' => 'special_price', 'min' => 0)) !!}
										@if ($errors->has('special_price'))
										  <span class="error">
											{{ $errors->first('special_price') }}
										  </span>
										@endif
									</div>
								</div>
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
								
							<input class="btn btn-primary" type="submit" value="Create">
							<a class="btn btn-info" href="{{ route('admin.product.list') }}">Cancel</a>
						</fieldset>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {
    // validate the comment form when it is submitted
    $("#productAdd").validate({
    	ignore: [],
		debug: true,
		rules: {
            product_name: {
                required: true
            }
        },
        messages: {
            product_name: {
                required: "This field is required."
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
	if ($("#description_zh").length) {
		tinymce.init({
			selector: '#description_zh',
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
	if ($("#description_fr").length) {
		tinymce.init({
			selector: '#description_fr',
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
	if ($("#description_de").length) {
		tinymce.init({
			selector: '#description_de',
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
	if ($("#description_es").length) {
		tinymce.init({
			selector: '#description_es',
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
	if ($("#description_ru").length) {
		tinymce.init({
			selector: '#description_ru',
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
	if ($("#description_ja").length) {
		tinymce.init({
			selector: '#description_ja',
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
	if ($("#description_ko").length) {
		tinymce.init({
			selector: '#description_ko',
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
</script>
@endsection
