<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper">
        <span class="navbar-brand brand-logo">
          {{ (isset($settings) && $settings->website_name != '') ? $settings->website_name : env('APP_NAME') }}
        </span>
        <span class="navbar-brand brand-logo">
          {{ (isset($settings) && $settings->website_name != '') ? $settings->website_name : env('APP_NAME') }}
        </span>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center">
        <p class="page-name d-none d-lg-block">{{ __('Welcome, Admin!') }}</p>
        <ul class="navbar-nav ml-lg-auto">
          <li class="nav-item lang-dropdown d-none d-sm-block">
            <a class="nav-link" href="{{ route('admin.logout') }}">
              <p class="mb-0">{{ __('Logout') }}</i></p>
            </a>
          </li>
          <li class="nav-item d-none d-sm-block profile-img">
            <a class="nav-link profile-image" href="javascript:void(0)">
              <img src="{{ asset('images/faces/face28.jpg') }}" alt="profile-img">
              <span class="online-status online bg-success"></span>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center ml-auto" type="button" data-toggle="offcanvas">
          <span class="icon-menu icons"></span>
        </button>
	</div>
</nav>