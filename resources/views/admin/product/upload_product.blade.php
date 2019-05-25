@extends('layouts.admin.app')

@section('content')
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

					{!! Form::model($product, ['route' => 'admin.product.upload_product', 'files' => true, 'id' => 'productAdd', 'class' => 'cmxform', 'method' => 'POST', 'novalidate'] ) !!}
						<h4 class="card-title">{{ __('Upload Product') }}</h4>

						<div class="form-group">
			            	<span><i class="fa fa-download" aria-hidden="true"></i>
								<a href="{{ route('admin.product.download_template') }}">
									Download Template File
								</a>
							</span>
						</div>
						<p>&nbsp;</p>

						<fieldset>
							<div class="form-group">
								<label for="name">{{ __('Product') }}<span class="text-danger">&#042;</span></label>
								{!! Form::file('product_file', array('required', 'id' => 'product_file', 'class' => 'form-control')) !!}
								@if ($errors->has('product_file'))
									<span class="error">
										{{ $errors->first('product_file') }}
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
$.validator.setDefaults({
    submitHandler: function(form) {
        form.submit();
    }
});

$(function() {
    // validate the comment form when it is submitted
    $("#productAdd").validate({
    	ignore: [],
		errorPlacement: function(label, element) {
			label.addClass('mt-2 text-danger');
			label.insertAfter(element);
		},
		highlight: function(element, errorClass) {
			$(element).parents('.form-group').addClass('has-danger');
			$(element).addClass('form-control-danger');
		}
  	});
});

$("#product_file").change(function (e) {
    var fileExtension = ['xlx', 'xlsx'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only formats are allowed : "+fileExtension.join(', '));
        document.getElementById('product_file').value="";
    }
});
</script>
@endsection