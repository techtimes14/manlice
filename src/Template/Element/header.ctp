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
						<li><a href="<?php echo Router::url(array('controller'=>'Sites','action'=>'how-it-works'),true);?>">How It Works</a></li>
						<li><a href="<?php echo Router::url(array('controller'=>'Sites','action'=>'contact-us'),true);?>">Contact Us</a></li>
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
	
	<div class="sectionOdd homeBanner">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 cont_left">
					<div class="table_box">
						<div class="table_box_cell">
							<h2 class="heading"><span><em>We'll find the best</em> agent for you.</span></h2>
						</div>
					</div>
				</div>
				<div class="col-sm-7 cont_right">
					<div class="cont_right_bg">
						<div class="homeslider owl-carousel">
						<?php
						if(!empty($all_banners)){
							foreach($all_banners as $val){
								$image = Router::url('/uploads/banner/thumb/', true).$val['image'];
						?>
							<div class="item">
								<div class="slider_item" style="background-image: url(<?php echo $image;?>);">
									<img src="<?php echo $image;?>" alt="" />
								</div>
							</div>
						<?php
							}
						}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>