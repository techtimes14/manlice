<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">What is your Mortgage Status?</h2>
	<form>
		<div class="col3">
		<?php
		if(!empty($all_mortgage)){
		?>
			<ul class="ul row radioBar">
		<?php
			foreach($all_mortgage as $key_mortgage => $val_mortgage){
		?>
				<li class="col-sm-4">
					<label class="inputRadio" id="iambuying_mortgage_<?php echo $val_mortgage['id'];?>">
						<input type="radio" name="iambuying_mortgage" id="iambuying_mortgage" value="<?php echo $val_mortgage['id'];?>" class="iambuying_next4" />
						<span><?php echo $val_mortgage['title'];?></span>
					</label>
				</li>
		<?php
			}
		?>
			</ul>
		<?php
		}
		?>
		</div>
	</form>
</div>
<script>
$(function () {	
	var website_url = $('#website_url').val();
	$('.iambuying_next4').click(function(e){
		var iambuying_mortgage_id	= this.value;
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iambuying_step5',
			data: {'iambuying_mortgage_id':iambuying_mortgage_id},
			beforeSend: function() {
				$('.iambuying_next4').parent( "#iambuying_mortgage_"+iambuying_mortgage_id ).addClass('clicked');
			},
			success: function(imbuying_response4){
				$('.iambuying_next4').parent( "#iambuying_mortgage_"+iambuying_mortgage_id ).removeClass('clicked');
				$('#iambuying-steps').html(imbuying_response4);
				$.fancybox([ { href : '#iambuying-steps' } ]);
			}
		});
	});	
});
</script>