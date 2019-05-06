<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">What is the address of your property?</h2>
	<form id="iamselling_address_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Street Address</label>
					<div class="inputRight">
						<input type="text" name="iamselling_street_address" id="iamselling_street_address" value="" class="required" placeholder="Street Address" />
					</div>
				</li>
				<li class="col-sm-12">
					<label class="labelLeft">City, State</label>
					<div class="inputRight">
						<ul class="ul row">
							<li class="col-sm-7">
								<input type="text" name="iamselling_city" id="iamselling_city" value="<?php echo $iamselling_city;?>" class="required" placeholder="Anchorage" />
							</li>
							<li class="col-sm-5">
								<select name="iamselling_state_code" id="iamselling_state_code" class="required">
									<option value="">Select</option>
								<?php foreach($all_states as $val_state){ ?>
									<option value="<?php echo $val_state['state_code'];?>" <?php if($val_state['state_code'] == $iamselling_statecode)echo 'selected';?>><?php echo $val_state['state_code'];?></option>
								<?php } ?>
								</select>
							</li>
						</ul>
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iamselling_next4">Next</button>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbiiL-qVSWWsC_C8OouravI0OTnVq1MFM&libraries=places&callback=initMap" async defer></script>
<script>
function initMap() {
	var input = document.getElementById('iamselling_street_address');
	var autocomplete = new google.maps.places.Autocomplete(input);              
}
$(function () {	
	var website_url = $('#website_url').val();
	$('.iamselling_next4').click(function(e){
		$('#iamselling_address_form').validate({
			submitHandler:function(){
				var iamselling_street_address	= $('#iamselling_street_address').val();
				var iamselling_city				= $('#iamselling_city').val();
				var iamselling_state_code		= $('#iamselling_state_code').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamselling_step5',
					data: {'iamselling_street_address':iamselling_street_address,'iamselling_city':iamselling_city,'iamselling_state_code':iamselling_state_code},
					beforeSend: function() {
						$('.iamselling_next4').addClass('clicked');
					},
					success: function(iamselling_response4){
						$('.iamselling_next4').removeClass('clicked');
						$('#iamselling-steps').html(iamselling_response4);
						$.fancybox({ href : '#iamselling-steps' });
					}
				});
			}
		});
	});	
});
</script>