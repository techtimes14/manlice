<?php
use Cake\Routing\Router;
$session = $this->request->session();
?>
<header>
	<div class="header_main">
		<div class="container">
			<div class="logo">
				<a href="<?php echo Router::url('/', true);?>"><img src="<?php echo Router::url('/', true);?>images/logo.png" alt="" /></a>
			</div>
			<div class="nav_wrapper">
				<nav class="nav_menu">
					<ul class="clearfix">
						<li <?php if($this->request->params['controller']=='Sites' && $this->request->params['action']=='howItWorks'){ echo 'class="active"'; }?>><a href="<?php echo Router::url(array('controller'=>'Sites','action'=>'how-it-works'),true);?>">How It Works</a></li>
						<li <?php if($this->request->params['controller']=='Sites' && $this->request->params['action']=='contactUs'){ echo 'class="active"'; }?>><a href="<?php echo Router::url(array('controller'=>'Sites','action'=>'contact-us'),true);?>">Contact Us</a></li>
						<li><a href="<?php echo Router::url('/', true);?>#findAgent" class="findAgentLink">Find Agents Now</a></li>
					</ul>
				</nav>
				<div data-sidebar="true" class="sidebar-right">
                    <div class="sidebar_overlay"></div>
                    <span class="responsive_btn sidebar-toggle"><span></span></span>
                    <div class="sidebar-wrapper sidebar-default">
                        <div class="sidebar-scroller">
                            <ul class="sidebar-menu"></ul>
                        </div>
                    </div>
                </div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="innerBanner" style="background-image: url(images/banner.jpg);">
		<div class="bannerText">
			<h1 class="heading"><?php echo $cms_data['title'];?></h1>
		</div>
	</div>
</header>