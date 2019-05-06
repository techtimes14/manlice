<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">Let us know where to send your personalized Realtor recommendations and we're done!</h2>
	<form id="iambuying_email_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Email</label>
					<div class="inputRight">
						<input type="email" name="iambuying_email" id="iambuying_email" class="required" value="" placeholder="Email" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iambuying_next6">Next</button>
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
	$('.iambuying_next6').click(function(e){
		$('#iambuying_email_form').validate({
			submitHandler:function(){
				var iambuying_email	= $('#iambuying_email').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iambuying_step7',
					data: {'iambuying_email':iambuying_email},
					beforeSend: function() {
						$('.iambuying_next6').addClass('clicked');
					},
					success: function(imbuying_response6){
						$('.iambuying_next6').removeClass('clicked');
						$('#iambuying-steps').html(imbuying_response6);
						$.fancybox([ { href : '#iambuying-steps' } ]);
					}
				});
			}
		});
	});	
});
</script>