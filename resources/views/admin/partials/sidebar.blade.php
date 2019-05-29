<style type="text/css">
  /* .sidebar .nav {
      max-height: 109vh !important;
      overflow-y: auto;
  } */
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item @if (Route::current()->getName() == 'admin.dashboard') active @endif">
		<a class="nav-link" href="{{ route('admin.dashboard') }}">
			<i class="fas fa-tachometer-alt menu-icon"></i>
			<span class="menu-title">{{ __('Dashboard') }}</span>        
		</a>
    </li>
	
	<li class="nav-item @if (Route::current()->getName() == 'admin.product.list' || Route::current()->getName() == 'admin.product.add' || Route::current()->getName() == 'admin.product.edit' || Route::current()->getName() == 'admin.product.multifileupload') active @endif">
		<a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
			<i class="fa fa-book menu-icon" aria-hidden="true"></i>
			<span class="menu-title">{{ __('Product Management') }}</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			</span>
		</a>
		<div class="collapse @if (Route::current()->getName() == 'admin.product.list' || Route::current()->getName() == 'admin.product.add' || Route::current()->getName() == 'admin.product.edit' || Route::current()->getName() == 'admin.product.multifileupload') show @endif" id="product">
			<ul class="nav flex-column sub-menu">			
				<li class="nav-item @if (Route::current()->getName() == 'admin.product.list' || Route::current()->getName() == 'admin.product.multifileupload') active @endif">
					<a class="nav-link" href="{{ route('admin.product.list') }}"> List </a>
				</li>
				<li class="nav-item @if (Route::current()->getName() == 'admin.product.add') active @endif">
					<a class="nav-link" href="{{ route('admin.product.add') }}"> Add </a>
				</li>
			</ul>
		</div>
	</li>
    <!-- Product Management Section End -->
	
	<li class="nav-item @if (Route::current()->getName() == 'admin.cms.list' || Route::current()->getName() == 'admin.cms.add' || Route::current()->getName() == 'admin.cms.edit') active @endif">
        <a class="nav-link" data-toggle="collapse" href="#cms" aria-expanded="false" aria-controls="cms">
			<i class="far fa-file-alt menu-icon"></i>
			<span class="menu-title">{{ __('Cms Management') }}</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			</span>
        </a>
        <div class="collapse @if (Route::current()->getName() == 'admin.cms.list' || Route::current()->getName() == 'admin.cms.add' || Route::current()->getName() == 'admin.cms.edit') show @endif" id="cms">
			<ul class="nav flex-column sub-menu">
				<li class="nav-item @if (Route::current()->getName() == 'admin.cms.list') active @endif">
					<a class="nav-link" href="{{ route('admin.cms.list') }}"> List </a>
				</li>
				<li class="nav-item @if (Route::current()->getName() == 'admin.cms.add') active @endif">
					<a class="nav-link" href="{{ route('admin.cms.add') }}"> Add </a>
				</li>
			</ul>
        </div>
	</li>

    <li class="nav-item @if (Route::current()->getName() == 'admin.settings') active @endif">
		<a class="nav-link" href="{{ route('admin.settings') }}">
			<i class="fa fa-cog menu-icon" aria-hidden="true"></i>
			<span class="menu-title">{{ __('Settings') }}</span>
		</a>
    </li>
	<li class="nav-item @if (Route::current()->getName() == 'admin.user.changePassword') active @endif">
		<a class="nav-link" href="{{ route('admin.user.changePassword') }}">
			<i class="icon-settings fas fa-table menu-icon"></i>
			<span class="menu-title">{{ __('Change Password') }}</span>
		</a>
    </li>
	<li class="nav-item @if (Route::current()->getName() == 'admin.logout') active @endif">
		<a class="nav-link" href="{{ route('admin.logout') }}">
			<i class="icon-settings fas fa-sign-out-alt menu-icon"></i>
			<span class="menu-title">{{ __('Logout') }}</span>			
		</a>
	</li>
</ul>
</nav>