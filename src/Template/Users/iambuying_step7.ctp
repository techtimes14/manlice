<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">Let us know where to send your personalized Realtor recommendations and we're done!</h2>
	<form id="iambuying_phone_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Phone</label>
					<div class="inputRight">
						<input type="text" name="iambuying_phone" id="iambuying_phone" value="" class="required" placeholder="Phone" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iambuying_next7">Get Realtor</button>
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<div class="helpText">We don’t spam. We don’t sell your information.</div>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script>
$(function () {	
	var website_url = $('#website_url').val();
	$('.iambuying_next7').click(function(e){
		$('#iambuying_phone_form').validate({
			submitHandler:function(){
				var iambuying_phone	= $('#iambuying_phone').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iambuying_step8',
					data: {'iambuying_phone':iambuying_phone},
					beforeSend: function() {
						$('.iambuying_next7').addClass('clicked');
					},
					success: function(imbuying_response7){
						$('.iambuying_next7').removeClass('clicked');
						$('#iambuying-steps').html(imbuying_response7);
						$.fancybox([ { href : '#iambuying-steps' } ]);
					}
				});
			}
		});
	});	
});
</script>