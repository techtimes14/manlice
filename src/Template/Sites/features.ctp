<?php use Cake\Routing\Router; ?>
<!--MAIN CONTAINER START-->
<div class="mainContainer">	
	<div class="section">
		<div class="container">
			<div class="workSteps">
			<?php
			if(!empty($all_features)){
			?>
				<ul class="ul row">
			<?php
				foreach($all_features as $key => $val){
					if($val->image1 !=''){
						$image = Router::url('/uploads/features/thumb1/', true).$val->image1;
					}else{
						$image = Router::url('/images/', true).'no-image-available.png';
					}
			?>
					<li class="col-sm-12">
						<div class="step_block">
							<div class="step_img"><img src="<?php echo $image;?>" alt="<?php echo $val['title'];?>"></div>
							<div class="step_text">
								<span class="stepNo"><?php echo $key+1;?></span>
								<h2 class="subheading"><?php echo $val['title'];?></h2>
								<div class="editor_text">
									<p><?php echo $val['description'];?></p>
									<?php echo $val['description1'];?>
								</div>
							</div>
						</div>
					</li>					
				<?php
				}
				?>
				</ul>
			<?php
			}
			?>
			</div>
		</div>
	</div>
	
</div>
<!--MAIN CONTAINER END-->