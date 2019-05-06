<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">Let us know where to send your personalized Realtor recommendations and we're done!</h2>
	<form id="iamsellingbuying_email_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Email</label>
					<div class="inputRight">
						<input type="email" name="iamsellingbuying_email" id="iamsellingbuying_email" class="required" value="" placeholder="Email" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iamsellingbuying_next6">Next</button>
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
	$('.iamsellingbuying_next6').click(function(e){
		$('#iamsellingbuying_email_form').validate({
			submitHandler:function(){
				var iamsellingbuying_email	= $('#iamsellingbuying_email').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamsellingbuying_step7',
					data: {'iamsellingbuying_email':iamsellingbuying_email},
					beforeSend: function() {
						$('.iamsellingbuying_next6').addClass('clicked');
					},
					success: function(iamsellingbuying_response6){
						$('.iamsellingbuying_next6').removeClass('clicked');
						$('#iamsellingbuying-steps').html(iamsellingbuying_response6);
						$.fancybox([ { href : '#iamsellingbuying-steps' } ]);
					}
				});
			}
		});
	});	
});
</script>