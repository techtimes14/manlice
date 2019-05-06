<?php use Cake\Routing\Router; ?>
<!--MAIN CONTAINER START-->
<div class="mainContainer">	
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<div class="contact_details">
						<h2 class="heading"><span><em>GET IN</em> TOUCH WITH US</span></h2>
						<?php echo $cms_data['description'];?>
					</div>
				</div>
				
				<div class="col-sm-7">
					<div class="contact_form">
						<div class="form_wrap">
							<?php echo $this->Flash->render();?>
							<?php echo $this->Form->create($contact, ['id'=>'contact_us_form', 'novalidate' => 'novalidate', 'enctype'=>'multipart/form-data']);?>
								<ul class="clearfix">
									<li>
										<div class="input_wrap"><?php echo $this->Form->input('name', ['required' => true, 'label' => false, 'placeholder' => 'Name' ]); ?></div>
									</li>
									<li>
										<div class="input_wrap"><?php echo $this->Form->input('email', ['type'=>'email', 'required' => true, 'label' => false, 'placeholder' => 'Email' ]);?></div>
									</li>
									<li>
										<div class="input_wrap"><?php echo $this->Form->input('subject', ['required' => true, 'label' => false, 'placeholder' => 'Subject' ]);?></div>
									</li>
									<li>
										<div class="input_wrap"><?php echo $this->Form->input('message', ['type'=>'textarea', 'required' => true, 'label' => false, 'placeholder' => 'Message' ]);?></div>
									</li>
									<li class="text-right">
										<button type="submit">Send <i class="fa fa-long-arrow-right"></i></button>
									</li>
								</ul>
							<?php echo $this->Form->end();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<!--MAIN CONTAINER END-->
<script type="text/javascript">
$('#contact_us_form').validate({
	rules: {
		name: 'required',
	}
});
$(document).ready(function($){
	setTimeout(function(){
		//$('#contact_us_form').reset();
		$('.success').remove();
	},5000);	
});
</script>