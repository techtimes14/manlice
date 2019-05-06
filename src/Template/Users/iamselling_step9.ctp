<?php use Cake\Routing\Router;?>
<div class="popForm_body">
	<h2 class="subheading">Where would you like to buy?</h2>
	<form id="iambuying_address_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<ul class="ul row">
						<li class="col-sm-7">
							<input type="text" class="required" name="iambuying_city" id="iambuying_city" value="<?php echo $iambuying_city;?>" placeholder="City" />
						</li>
						<li class="col-sm-5">
							<select name="iambuying_state_code" id="iambuying_state_code" class="required">
								<option value="">Select</option>
							<?php foreach($all_states as $val_state){ ?>
								<option value="<?php echo $val_state['state_code'];?>" <?php if($val_state['state_code'] == $iambuying_state_code)echo 'selected';?>><?php echo $val_state['state_code'];?></option>
							<?php } ?>
							</select>
						</li>
					</ul>
				</li>
				<li class="col-sm-12">
					<div class="">
						<button type="submit" class="btnFull iamselling_next9">Next</button>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script>
$(function () {
	var website_url = $('#website_url').val();
	$('.iamselling_next9').click(function(e){
		$('#iambuying_address_form').validate({
			submitHandler:function(){
				var iambuying_city			= $('#iambuying_city').val();
				var iambuying_state_code	= $('#iambuying_state_code').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamselling_step10',
					data: {'iambuying_city':iambuying_city, 'iambuying_state_code':iambuying_state_code},
					beforeSend: function() {
						$('.iamselling_next9').addClass('clicked');
					},
					success: function(imselling_response9){
						$('.iamselling_next9').removeClass('clicked');
						$('#iamselling-steps').html(imselling_response9);
						$.fancybox([ { href : '#iamselling-steps' } ]);
					}
				});
			}
		});
	});
});
</script>