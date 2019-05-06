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
					<label class="inputRadio" id="iambuyingmortgage_<?php echo $val_mortgage['id'];?>">
						<input type="radio" name="iambuying_mortgage" id="iambuying_mortgage" value="<?php echo $val_mortgage['id'];?>" class="iamselling_next11" />
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
	$('.iamselling_next11').click(function(e){
		var iambuying_mortgage_id	= this.value;
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamselling_step12',
			data: {'iambuying_mortgage_id':iambuying_mortgage_id},
			beforeSend: function() {
				$('.iamselling_next11').parent( "#iambuyingmortgage_"+iambuying_mortgage_id ).addClass('clicked');
			},
			success: function(imselling_response11){
				$('.iamselling_next11').parent( "#iambuyingmortgage_"+iambuying_mortgage_id ).removeClass('clicked');
				$('#iamselling-steps').html(imselling_response11);
				$.fancybox([ { href : '#iamselling-steps' } ]);
			}
		});
	});	
});
</script>