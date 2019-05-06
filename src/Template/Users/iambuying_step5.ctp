<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">Let us know where to send your personalized Realtor recommendations and we're done!</h2>
	<form id="iambuying_fullname_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Full Name</label>
					<div class="inputRight">
						<input type="text" name="iambuying_fullname" id="iambuying_fullname" class="required" value="" placeholder="Full Name" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iambuying_next5">Next</button>
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
	$('.iambuying_next5').click(function(e){
		$('#iambuying_fullname_form').validate({
			submitHandler:function(){
				var iambuying_fullname	= $('#iambuying_fullname').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iambuying_step6',
					beforeSend: function() {
						$('.iambuying_next5').addClass('clicked');
					},
					data: {'iambuying_fullname':iambuying_fullname},
					success: function(imbuying_response5){
						$('.iambuying_next5').removeClass('clicked');
						$('#iambuying-steps').html(imbuying_response5);
						$.fancybox([ { href : '#iambuying-steps' } ]);
					}
				});
			}
		});
	});	
});
</script>