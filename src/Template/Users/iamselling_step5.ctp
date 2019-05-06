<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">Let us know where to send your personalized Realtor recommendations and we're done!</h2>
	<form id="iamselling_fullname_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">Full Name</label>
					<div class="inputRight">
						<input type="text" name="iamselling_fullname" id="iamselling_fullname" class="required" value="" placeholder="Full Name" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iamselling_next5">Next</button>
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
	$('.iamselling_next5').click(function(e){
		$('#iamselling_fullname_form').validate({
			submitHandler:function(){
				var iamselling_fullname	= $('#iamselling_fullname').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamselling_step6',
					data: {'iamselling_fullname':iamselling_fullname},
					beforeSend: function() {
						$('.iamselling_next5').addClass('clicked');
					},
					success: function(iamselling_response5){
						$('.iamselling_next5').removeClass('clicked');
						$('#iamselling-steps').html(iamselling_response5);
						$.fancybox([ { href : '#iamselling-steps' } ]);
					}
				});
			}
		});
	});	
});
</script>