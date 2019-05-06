<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">Let us know where to send your personalized Realtor recommendations and we're done!</h2>
	<form id="iamsellingbuying_phone_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Phone</label>
					<div class="inputRight">
						<input type="text" name="iamsellingbuying_phone" id="iamsellingbuying_phone" value="" class="required" placeholder="Phone" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iamsellingbuying_next7">Get Realtor</button>
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
	$('.iamsellingbuying_next7').click(function(e){
		$('#iamsellingbuying_phone_form').validate({
			submitHandler:function(){
				var iamsellingbuying_phone	= $('#iamsellingbuying_phone').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamsellingbuying_step8',
					data: {'iamsellingbuying_phone':iamsellingbuying_phone},
					beforeSend: function() {
						$('.iamsellingbuying_next7').addClass('clicked');
					},
					success: function(iamsellingbuying_response7){
						$('.iamsellingbuying_next7').removeClass('clicked');
						$('#iamsellingbuying-steps').html(iamsellingbuying_response7);
						$.fancybox([ { href : '#iamsellingbuying-steps' } ]);
					}
				});
			}
		});
	});	
});
</script>