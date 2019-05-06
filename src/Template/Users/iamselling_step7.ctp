<?php use Cake\Routing\Router; ?>
<div class="popForm_body thanku">
	<h2 class="subheading orng">CONGRATULATIONS!</h2>
	<h2 class="subheading">
		We are preparing your Realtor recommendations. Expect to hear from us soon, but if you need anything before then give us a call (877) 697-9300<br /><br />
		Are you also interested in buying a home?<br />
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<div class="">
						<button type="button" class="btnFull iamselling_next7">Yes</a>
					</div>
				</li>					
			</ul>
		</div>
	</h2>
</div>
<script>
$(function () {	
	var website_url = $('#website_url').val();
	$('.iamselling_next7').click(function(e){
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamselling_step8',
			data: {},
			beforeSend: function() {
				$('.iamselling_next7').addClass('clicked');
			},
			success: function(imselling_response7){
				$('.iamselling_next7').removeClass('clicked');
				$('#iamselling-steps').html(imselling_response7);
				$.fancybox([ { href : '#iamselling-steps' } ]);
			}
		});
	});	
});
</script>