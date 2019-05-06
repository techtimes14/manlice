<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">What zip code is your property located in?</h2>
	<form id="iamsellingbuying_zipcode_form">
		<div class="col3">
			<ul class="ul row">
				<li class="col-sm-12">
					<label class="labelLeft">ZIP Code</label>
					<div class="inputRight">
						<input type="text" name="iamsellingbuying_zipcode" id="iamsellingbuying_zipcode" value="" class="required" placeholder="99501" />
					</div>
				</li>
				<li class="col-sm-12">
					<div class="inputRight">
						<button type="submit" class="btnFull iamsellingbuying_next3">Next</button>
					</div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script>
$(function () {	
	var website_url = $('#website_url').val();
	$('.iamsellingbuying_next3').click(function(e){
		$('#iamsellingbuying_zipcode_form').validate({
			submitHandler:function(){
				var iamsellingbuying_zipcode = $('#iamsellingbuying_zipcode').val();
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url : website_url+'users/iamsellingbuying_step3_zipcode_checking',
					data: {'iamsellingbuying_zipcode':iamsellingbuying_zipcode},
					beforeSend: function() {
						$('.iamsellingbuying_next3').addClass('clicked');
					},
					success: function(checking_response){
						$('.iamsellingbuying_next3').removeClass('clicked');
						if(checking_response == 'exist'){
							$.ajax({
								type: 'POST',
								dataType: 'html',
								url : website_url+'users/iamsellingbuying_step4',
								data: {'iamsellingbuying_zipcode':iamsellingbuying_zipcode},
								success: function(iamsellingbuying_response3){
									$('#iamsellingbuying-steps').html(iamsellingbuying_response3);
									$.fancybox({ href : '#iamsellingbuying-steps' });
								}
							});
						}
						else{
							$('#iamsellingbuying_zipcode').addClass('error');
							$('#iamsellingbuying_zipcode').after('<label id="iamsellingbuying_zipcode-error" class="error" for="iamsellingbuying_zipcode">Please enter valid zipcode.</label>');
						}
					}
				});
			}
		});
	});	
});
</script>