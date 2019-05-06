<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">Where would you like to buy?</h2>
	<form id="iambuying_address_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<ul class="ul row">
						<li class="col-sm-7">
							<input type="text" class="required" name="iambuying_city" id="iambuying_city" placeholder="City" />
						</li>
						<li class="col-sm-5">
							<select name="iambuying_state_code" id="iambuying_state_code" class="required">
								<option value="">Select</option>
							<?php foreach($all_states as $val_state){ ?>
								<option value="<?php echo $val_state['state_code'];?>"><?php echo $val_state['state_code'];?></option>
							<?php } ?>
							</select>
						</li>
					</ul>
				</li>
				<li class="col-sm-12">
					<div class="">
						<button type="submit" class="btnFull iambuying_next2">Next</button>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script>
$(function () {
	var website_url = $('#website_url').val();
	$('.iambuying_next2').click(function(e){
		$('#iambuying_address_form').validate({
			submitHandler:function(){
				var iambuying_city		= $('#iambuying_city').val();
				var iambuying_state_code	= $('#iambuying_state_code').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iambuying_step3',
					data: {'iambuying_city':iambuying_city, 'iambuying_state_code':iambuying_state_code},
					beforeSend: function() {
						$('.iambuying_next2').addClass('clicked');
					},
					success: function(imbuying_response2){
						$('.iambuying_next2').removeClass('clicked');
						$('#iambuying-steps').html(imbuying_response2);
						$.fancybox([ { href : '#iambuying-steps' } ]);
					}
				});
			}
		});
	});
});
</script>