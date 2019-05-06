<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">Let us know where to send your personalized Realtor recommendations and we're done!</h2>
	<form id="iamselling_email_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Email</label>
					<div class="inputRight">
						<input type="email" name="iamselling_email" id="iamselling_email" class="required" value="" placeholder="Email" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iamselling_next6">Next</button>
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
	$('.iamselling_next6').click(function(e){
		$('#iamselling_email_form').validate({
			submitHandler:function(){
				var iamselling_email	= $('#iamselling_email').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamselling_step7',
					data: {'iamselling_email':iamselling_email},
					beforeSend: function() {
						$('.iamselling_next6').addClass('clicked');
					},
					success: function(imselling_response6){
						$('.iamselling_next6').removeClass('clicked');
						$('#iamselling-steps').html(imselling_response6);
						$.fancybox([ { href : '#iamselling-steps' } ]);
					}
				});
			}
		});
	});	
});
</script>