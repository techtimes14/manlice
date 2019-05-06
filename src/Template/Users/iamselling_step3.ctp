<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">What zip code is your property located in?</h2>
	<form id="iamselling_zipcode_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">ZIP Code</label>
					<div class="inputRight">
						<input type="text" name="iamselling_zipcode" id="iamselling_zipcode" value="" class="required" placeholder="99501" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iamselling_next3">Next</button>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script>
$(function () {	
	var website_url = $('#website_url').val();
	$('.iamselling_next3').click(function(e){
		$('#iamselling_zipcode_form').validate({
			submitHandler:function(){
				var iamselling_zipcode	= $('#iamselling_zipcode').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamselling_step3_zipcode_checking',
					data: {'iamselling_zipcode':iamselling_zipcode},
					beforeSend: function() {
						$('.iamselling_next3').addClass('clicked');
					},
					success: function(checking_response){
						$('.iamselling_next3').removeClass('clicked');
						if(checking_response == 'exist'){
							$.ajax({
								type: 'POST',
								dataType: 'html',
								url : website_url+'users/iamselling_step4',
								data: {'iamselling_zipcode':iamselling_zipcode},
								success: function(iamselling_response3){
									$('#iamselling-steps').html(iamselling_response3);
									$.fancybox({ href : '#iamselling-steps' });
								}
							});
						}
						else{
							$('#iamselling_zipcode').addClass('error');
							$('#iamselling_zipcode').after('<label id="iamselling_zipcode-error" class="error" for="iamselling_zipcode">Please enter valid zipcode.</label>');
						}
					}
				});
			}
		});
	});	
});
</script>