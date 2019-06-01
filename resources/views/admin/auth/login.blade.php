@extends('layouts.admin.login')

@section('content')
<div class="row w-100">
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-dark text-left p-5">
			<div class="row w-100">
				<div class="col-lg-4 mx-auto" style="margin-left: 0 !important; text-align: center;">
					<img src="{{ asset('images/site/logo.png') }}" alt="profile-img" style="text-align: center;">
				</div>
			</div>
			<br>
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
                @endif
            @endforeach
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1"><strong>{{ __('E-Mail Address') }}</strong></label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" value="{{ old('email') }}" required autofocus name="email">
						<i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><strong>{{ __('Password') }}</strong></label>
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Enter Password" name="password" required>
						<i class="fa fa-lock" aria-hidden="true"></i>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Login') }}</button>
                </div>
                <!-- <div class="mt-3 text-center">
                    <a href="#" class="auth-link text-white">Forgot password?</a>
                </div> -->
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/admin/dashboard.js') }}"></script>
<script type="text/javascript">
    $('form').validate({
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>
@endsection