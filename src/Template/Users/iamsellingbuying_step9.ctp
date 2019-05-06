<?php use Cake\Routing\Router;?>
<div class="popForm_body">
	<h2 class="subheading">Where would you like to buy?</h2>
	<form id="iamsellingbuying_address_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<ul class="ul row">
						<li class="col-sm-7">
							<input type="text" class="required" name="iamsellingbuying_city" id="iamsellingbuying_city" value="<?php echo $iamsellingbuying_city;?>" placeholder="City" />
						</li>
						<li class="col-sm-5">
							<select name="iamsellingbuying_state_code" id="iamsellingbuying_state_code" class="required">
								<option value="">Select</option>
							<?php foreach($all_states as $val_state){ ?>
								<option value="<?php echo $val_state['state_code'];?>" <?php if($val_state['state_code'] == $iamsellingbuying_state_code)echo 'selected';?>><?php echo $val_state['state_code'];?></option>
							<?php } ?>
							</select>
						</li>
					</ul>
				</li>
				<li class="col-sm-12">
					<div class="">
						<button type="submit" class="btnFull iamsellingbuying_next9">Next</button>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script>
$(function () {
	var website_url = $('#website_url').val();
	$('.iamsellingbuying_next9').click(function(e){
		$('#iamsellingbuying_address_form').validate({
			submitHandler:function(){
				var iamsellingbuying_city1			= $('#iamsellingbuying_city').val();
				var iamsellingbuying_state_code1	= $('#iamsellingbuying_state_code').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamsellingbuying_step10',
					data: {'iamsellingbuying_city1':iamsellingbuying_city1, 'iamsellingbuying_state_code1':iamsellingbuying_state_code1},
					beforeSend: function() {
						$('.iamsellingbuying_next9').addClass('clicked');
					},
					success: function(iamsellingbuying_response9){
						$('.iamsellingbuying_next9').removeClass('clicked');
						$('#iamsellingbuying-steps').html(iamsellingbuying_response9);
						$.fancybox([ { href : '#iamsellingbuying-steps' } ]);
					}
				});
			}
		});
	});
});
</script>