<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">Let us know where to send your personalized Realtor recommendations and we're done!</h2>
	<form id="iamsellingbuying_fullname_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Full Name</label>
					<div class="inputRight">
						<input type="text" name="iamsellingbuying_fullname" id="iamsellingbuying_fullname" class="required" value="" placeholder="Full Name" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iamsellingbuying_next5">Next</button>
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
	$('.iamsellingbuying_next5').click(function(e){
		$('#iamsellingbuying_fullname_form').validate({
			submitHandler:function(){
				var iamsellingbuying_fullname	= $('#iamsellingbuying_fullname').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamsellingbuying_step6',
					data: {'iamsellingbuying_fullname':iamsellingbuying_fullname},
					beforeSend: function() {
						$('.iamsellingbuying_next5').addClass('clicked');
					},
					success: function(iamsellingbuying_response5){
						$('.iamsellingbuying_next5').removeClass('clicked');
						$('#iamsellingbuying-steps').html(iamsellingbuying_response5);
						$.fancybox([ { href : '#iamsellingbuying-steps' } ]);
					}
				});
			}
		});
	});	
});
</script>