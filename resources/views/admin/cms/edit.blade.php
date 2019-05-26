@extends('layouts.admin.app')

@section('content')
<script src="{{ asset('js/admin/misc.js') }}"></script>
<script src="{{ asset('js/admin/tinymce.min.js') }}"></script>
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
					{!! Form::model($cms, ['route' => ['admin.cms.edit', base64_encode($cms->id).'?redirect='.urlencode(Request::query('redirect'))], 'id' => 'cmsAdd', 'class' => 'cmxform', 'method' => 'PUT', 'novalidate'] ) !!}
						<h4 class="card-title">{{ __('Edit Page') }}</h4>
						<fieldset>
							<div class="form-group">
								<label for="title">{{ __('Title') }}<span class="text-danger">&#042;</span></label>
								{!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Title'), 'id' => 'title')) !!}
								@if ($errors->has('title'))
									<span class="error">
										{{ $errors->first('title') }}
									</span>
								@endif
							</div>
							<div class="form-group">
								<label for="content">{{ __('Content') }}<span class="text-danger">&#042;</span></label>
								{!! Form::textarea('content', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Content'), 'id' => 'content')) !!}
								@if ($errors->has('content'))
									<span class="error">
										{{ $errors->first('content') }}
									</span>
								@endif
							</div>
							<div class="form-group">
								<label for="slug">{{ __('Slug') }}<span class="text-danger">&#042;</span></label>
								{!! Form::text('slug', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Slug'), 'id' => 'slug', 'readonly')) !!}
								@if ($errors->has('slug'))
									<span class="error">
										{{ $errors->first('slug') }}
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
								<label for="meta_keyword">{{ __('Meta Keyword') }}<span class="text-danger">&#042;</span></label>
								{!! Form::textarea('meta_keyword', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Meta Keyword'), 'id' => 'meta_keyword')) !!}
								@if ($errors->has('meta_keyword'))
									<span class="error">
										{{ $errors->first('meta_keyword') }}
									</span>
								@endif
							</div>

							<div class="form-group">
								<label for="meta_description">{{ __('Meta Description') }}<span class="text-danger">&#042;</span></label>
								{!! Form::textarea('meta_description', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Meta Description'), 'id' => 'meta_description')) !!}
								@if ($errors->has('meta_description'))
									<span class="error">
										{{ $errors->first('meta_description') }}
									</span>
								@endif
							</div>
							
							<input class="btn btn-primary" type="submit" value="Submit">
							<a class="btn btn-info" href="{{ route('admin.cms.list') }}">Cancel</a>
						</fieldset>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$.validator.setDefaults({
    submitHandler: function(form) {
        form.submit();
    }
});
$(function() {
    // validate the comment form when it is submitted
    $("#cmsAdd").validate({
    	ignore: [],
		errorPlacement: function(label, element) {
			label.addClass('mt-2 text-danger');
			label.insertAfter(element);
		},
		highlight: function(element, errorClass) {
			$(element).parents('.form-group').addClass('has-danger')
			$(element).addClass('form-control-danger')
		}
  	});
});

/*Tinymce editor*/
if ($("#content").length) {
    tinymce.init({
        selector: '#content',
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
$('#title').on('blur', function(){
	var title = $.trim($(this).val());
	if(title != ''){
		//if($.trim($('#slug').val()) == ''){
			$('#slug').val(title.replace(/ /g,"-").toLowerCase());
		//}
	}
});
</script>
@endsection