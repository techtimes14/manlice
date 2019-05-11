<?php use Cake\Routing\Router; ?>
<!--MAIN CONTAINER START-->
<div class="mainContainer">	
	<div class="sectionOdd homeFeatures">
		<div class="container">
			<div class="row">
				<?php
				if(!empty($features_data)){
				?>
				<div class="col-sm-5 cont_left">
					<div class="table_box">
						<div class="table_box_cell">
							<h1 class="heading"><span><?php echo $features_data['title'];?></span></h1>
							<div class="editor_text">
								<?php echo $features_data['description'];?>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
				if( !empty($all_features) ){					
				?>
				<div class="col-sm-7 cont_right">
					<div class="cont_right_bg" style="background-image: url(images/bg_features.jpg);"></div>
					<div class="cont_right_inner">
						<div class="">
							<ul class="ul row">
							<?php
							foreach($all_features as $val_hiw){
								$hiw_image = '';
								if($val_hiw->image !=''){
									$hiw_image = Router::url('/uploads/features/thumb/', true).$val_hiw->image;
								}else{
									$hiw_image = Router::url('/images/', true).'no-image-available.png';
								}
							?>
								<li class="col-sm-6">
									<div class="step_block">
										<div class="step_icon"><img src="<?php echo $hiw_image;?>" alt="" /></div>
										<div class="step_text">
											<h2 class="subheading"><?php echo $val_hiw['title'];?></h2>
											<div>
												<p><?php echo $val_hiw['description'];?></p>
											</div>
										</div>
									</div>
								</li>
							<?php
							}
							?>
							</ul>
						</div>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	
	<div class="sectionEven homeForm" id="findAgent">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 cont_left">
					<div class="cont_right_bg" style="background-image: url(images/bg_form.jpg);">
						<div class="table_box">
							<div class="table_box_cell">
								<h2 class="heading"><span><em>FIND AND COMPARE THE BEST</em> LOCAL REAL ESTATE AGENTS!</span></h2>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-7 cont_right">
					<div class="">
						<form>
							<ul class="ul">
								<li>
									<div class="form_radio">
										<label>
											<input type="radio" class='clsprotype iambuying' name="propertyType">
											<div class="formIcon"><img src="images/icon_buy.png" alt=""></div>
											<span>I’m Buying</span>
										</label>
									</div>
								</li>
								<li>
									<div class="form_radio">
										<label>
											<input type="radio" class='clsprotype iamselling' name="propertyType">
											<div class="formIcon"><img src="images/icon_sell.png" alt=""></div>
											<span>I’m Selling</span>
										</label>
									</div>
								</li>
								<li>
									<div class="form_radio">
										<label>
											<input type="radio" class='clsprotype iamsellingbuying' name="propertyType">
											<div class="formIcon"><img src="images/icon_both.png" alt=""></div>
											<span>Both</span>
										</label>
									</div>
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="sectionOdd homeService">
		<div class="container">
			<div class="row">
				<?php
				if(!empty($sercices_data)){
				?>
				<div class="col-sm-5 cont_left">
					<div class="table_box">
						<div class="table_box_cell">
							<h2 class="heading"><span><?php echo $sercices_data['title'];?></span></h2>
							<div class="editor_text">
								<?php echo $sercices_data['description'];?>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
				if(!empty($all_services)){						
				?>
				<div class="col-sm-7 cont_right">
					<div class="cont_right_bg"></div>
					<div class="cont_right_inner">
						<div class="">
							<ul class="ul row">
							<?php
							foreach($all_services as $val_service){
								$image = '';
								if($val_service->image !=''){
									$image = Router::url('/uploads/service/thumb/', true).$val_service->image;
								}else{
									$image = Router::url('/images/', true).'no-image-available.png';
								}
							?>
								<li class="col-sm-6">
									<div class="service_block">
										<div class="simg"><img src="<?php echo $image;?>" alt="" /></div>
										<div class="stext">
											<h2 class="subheading"><?php echo $val_service['title'];?></h2>
											<strong><?php echo $val_service['designation'];?></strong>
											<div>
												<p><?php echo strip_tags(substr($val_service['description'],0,100));?></p>
												<a href="#" class="btn btnT btnSmall">View More</a>
											</div>
										</div>
									</div>
								</li>
							<?php
							}
							?>
							</ul>
						</div>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	
	<div class="sectionOdd homeAbout">
		<div class="container">
			<div class="row">
				<?php
				if(!empty($clients_about_us)){
				?>
				<div class="col-sm-5 cont_left">
					<div class="table_box">
						<div class="table_box_cell">
							<h2 class="heading"><span><?php echo $clients_about_us['title'];?></span></h2>
							<div class="editor_text">
								<?php echo $clients_about_us['description'];?>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
				if(!empty($all_testimonials)){						
				?>
				<div class="col-sm-7 cont_right">
					<div class="cont_right_bg"></div>
					<div class="cont_right_inner">
						<div class="">
							<ul class="ul row">
							<?php
							foreach($all_testimonials as $val_testimonial){
								$avatar = '';
								if($val_testimonial->image !=''){
									$avatar = Router::url('/uploads/testimonial/thumb/', true).$val_testimonial->image;
								}else{
									$avatar = Router::url('/images/', true).'no-image-available.png';
								}
							?>
								<li class="col-sm-6">
									<div class="testimonial_block">
										<div class="timg"><img src="<?php echo $avatar;?>" alt="" /></div>
										<div class="ttext">
											<h2 class="subheading"><?php echo $val_testimonial['name'];?></h2>
											<div class="ttag"><?php echo $val_testimonial['designation'];?></div>
											<div>
												<p><?php echo strip_tags(substr($val_testimonial['short_description'],0,145));?></p>
											</div>
										</div>
									</div>
								</li>
							<?php
							}
							?>
							</ul>
						</div>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	
</div>
<!--MAIN CONTAINER END-->