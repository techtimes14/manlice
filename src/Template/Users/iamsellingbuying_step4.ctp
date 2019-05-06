<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">What is the address of your property?</h2>
	<form id="iamsellingbuying_address_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Street Address</label>
					<div class="inputRight">
						<input type="text" name="iamsellingbuying_street_address" id="iamsellingbuying_street_address" value="" class="required" placeholder="Street Address" />
					</div>
				</li>
				<li class="col-sm-12">
					<label class="labelLeft">City, State</label>
					<div class="inputRight">
						<ul class="ul row">
							<li class="col-sm-7">
								<input type="text" name="iamsellingbuying_city" id="iamsellingbuying_city" value="<?php echo $iamsellingbuying_city;?>" class="required" placeholder="Anchorage" />
							</li>
							<li class="col-sm-5">
								<select name="iamsellingbuying_state_code" id="iamsellingbuying_state_code" class="required">
									<option value="">Select</option>
								<?php foreach($all_states as $val_state){ ?>
									<option value="<?php echo $val_state['state_code'];?>" <?php if($val_state['state_code'] == $iamsellingbuying_statecode)echo 'selected';?>><?php echo $val_state['state_code'];?></option>
								<?php } ?>
								</select>
							</li>
						</ul>
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iamsellingbuying_next4">Next</button>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbiiL-qVSWWsC_C8OouravI0OTnVq1MFM&libraries=places&callback=initMap" async defer></script>
<script>
function initMap() {
	var input = document.getElementById('iamsellingbuying_street_address');
	var autocomplete = new google.maps.places.Autocomplete(input);              
}
$(function () {	
	var website_url = $('#website_url').val();
	$('.iamsellingbuying_next4').click(function(e){
		$('#iamsellingbuying_address_form').validate({
			submitHandler:function(){
				var iamsellingbuying_street_address	= $('#iamsellingbuying_street_address').val();
				var iamsellingbuying_city			= $('#iamsellingbuying_city').val();
				var iamsellingbuying_state_code		= $('#iamsellingbuying_state_code').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamsellingbuying_step5',
					data: {'iamsellingbuying_street_address':iamsellingbuying_street_address,'iamsellingbuying_city':iamsellingbuying_city,'iamsellingbuying_state_code':iamsellingbuying_state_code},
					beforeSend: function() {
						$('.iamsellingbuying_next4').addClass('clicked');
					},
					success: function(iamsellingbuying_response4){
						$('.iamsellingbuying_next4').removeClass('clicked');
						$('#iamsellingbuying-steps').html(iamsellingbuying_response4);
						$.fancybox({ href : '#iamsellingbuying-steps' });
					}
				});
			}
		});
	});	
});
</script>