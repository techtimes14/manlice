<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">When do you plan to buy a home?</h2>
	<form>
		<div class="col3">
		<?php
		if(!empty($all_plans)){
		?>
			<ul class="ul row radioBar">
		<?php
			foreach($all_plans as $key_plan => $val_plan){
		?>
				<li class="col-sm-4">
					<label class="inputRadio" id="iambuyingplan_<?php echo $val_plan['id'];?>">
						<input type="radio" name="iambuying_plan" id="iambuying_plan" value="<?php echo $val_plan['id'];?>" class="iamselling_next10" />
						<span><?php echo $val_plan['title'];?></span>
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
	$('.iamselling_next10').click(function(e){
		var iambuying_plan_id	= this.value;
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamselling_step11',
			data: {'iambuying_plan_id':iambuying_plan_id},
			beforeSend: function() {
				$('.iamselling_next10').parent( "#iambuyingplan_"+iambuying_plan_id ).addClass('clicked');
			},
			success: function(imselling_response10){
				$('.iamselling_next10').parent( "#iambuyingplan_"+iambuying_plan_id ).removeClass('clicked');
				$('#iamselling-steps').html(imselling_response10);
				$.fancybox([ { href : '#iamselling-steps' } ]);
			}
		});
	});	
});
</script>