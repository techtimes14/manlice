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
					{!! Form::model($settings, ['route' => 'admin.settings', 'id' => 'websiteSettings', 'class' => 'cmxform', 'method' => 'PUT'] ) !!}
						<h4 class="card-title">{{ __('Website Settings') }}</h4>
						<fieldset>
							<div class="form-group">
								<label for="website_name">{{ __('Website Name') }}<span class="text-danger">&#042;</span></label>
								{!! Form::text('website_name', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter website name'), 'id' => 'website_name')) !!}
							</div>
							<div class="form-group">
								<label for="contact_number">{{ __('Contact Number') }}<span class="text-danger">&#042;</span></label>
								{!! Form::text('contact_number', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter contact number in which users will contact you'), 'id' => 'contact_number')) !!}
							</div>
							<div class="form-group">
								<label for="contact_email">{{ __('Contact Email') }}<span class="text-danger">&#042;</span></label>
								{!! Form::text('contact_email', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Email ID that will be used by the users to contact you from websites contact form'), 'id' => 'contact_email')) !!}
							</div>
							<div class="form-group">
								<label for="contact_email">{{ __('Order Email') }}<span class="text-danger">&#042;</span></label>
								{!! Form::text('order_email', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter Email ID'), 'id' => 'order_email')) !!}
							</div>
							<div class="form-group">
								<label for="address">{{ __('Address') }}<span class="text-danger">&#042;</span></label>
								{!! Form::text('address', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter your main office address'), 'id' => 'address')) !!}
							</div>
							<div class="form-group">
								<label for="facebook_link">{{ __('Website Facebook Link') }}</label>
								{!! Form::text('facebook_link', null, array('class'=>'form-control', 'placeholder' => __('Enter websites facebook link'), 'id' => 'facebook_link')) !!}
							</div>
							<div class="form-group">
								<label for="google_plus_link">{{ __('Website Google Plus Link') }}</label>
								{!! Form::text('google_plus_link', null, array('class'=>'form-control', 'placeholder' => __('Enter websites google plus link'), 'id' => 'google_plus_link')) !!}
							</div>
							<div class="form-group">
								<label for="twitter_link">{{ __('Website Twitter Link') }}</label>
								{!! Form::text('twitter_link', null, array('class'=>'form-control', 'placeholder' => __('Enter websites twitter link'), 'id' => 'twitter_link')) !!}
							</div>
							<div class="form-group">
								<label for="pinterest_link">{{ __('Website Pinterest Link') }}</label>
								{!! Form::text('pinterest_link', null, array('class'=>'form-control', 'placeholder' => __('Enter websites pinterest link'), 'id' => 'pinterest_link')) !!}
							</div>
							<div class="form-group">
								<label for="instagram_link">{{ __('Website Instagram Link') }}</label>
								{!! Form::text('instagram_link', null, array('class'=>'form-control', 'placeholder' => __('Enter websites instagram link'), 'id' => 'instagram_link')) !!}
							</div>
                            <div class="form-group">
								<label for="youtube_link">{{ __('Website Youtube Link') }}</label>
								{!! Form::text('youtube_link', null, array('class'=>'form-control', 'placeholder' => __('Enter websites youtube link'), 'id' => 'youtube_link')) !!}
							</div>
                            <div class="form-group">
								<label for="rssfeed_url">{{ __('Website RSS Feed') }}</label>
								{!! Form::text('rssfeed_url', null, array('class'=>'form-control', 'placeholder' => __('Enter websites rss feed'), 'id' => 'rssfeed_url')) !!}
							</div>
							<input class="btn btn-primary" type="submit" value="Submit">
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
    $("#websiteSettings").validate({
    	rules: {
            contact_email: {
                required: true,
                email: true
            },
			order_email: {
                required: true,
                email: true
            }
        },
		errorPlacement: function(label, element) {
			label.addClass('mt-2 text-danger');
			label.insertAfter(element);
		},
		highlight: function(element, errorClass) {
			$(element).parent().addClass('has-danger')
			$(element).addClass('form-control-danger')
		}
  	});
});


</script>
@endsection