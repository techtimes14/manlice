@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
        <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
    @endif
@endforeach
	<div class="row">
		<div class="col-xs-12">
			<h4>Welcome To {{ env('APP_NAME') }} Admin Panel</h4>
		</div>
	</div>
</div>

@endsection