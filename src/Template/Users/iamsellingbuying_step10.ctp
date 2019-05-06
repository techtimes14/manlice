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
					<label class="inputRadio" id="iamsellingbuyingplan_<?php echo $val_plan['id'];?>">
						<input type="radio" name="iamsellingbuying_plan" id="iamsellingbuying_plan" value="<?php echo $val_plan['id'];?>" class="iamsellingbuying_next10" />
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
	$('.iamsellingbuying_next10').click(function(e){
		var iamsellingbuying_plan_id	= this.value;
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamsellingbuying_step11',
			data: {'iamsellingbuying_plan_id':iamsellingbuying_plan_id},
			beforeSend: function() {
				$('.iamsellingbuying_next10').parent( "#iamsellingbuyingplan_"+iamsellingbuying_plan_id ).addClass('clicked');
			},
			success: function(iamsellingbuying_response10){
				$('.iamsellingbuying_next10').parent( "#iamsellingbuyingplan_"+iamsellingbuying_plan_id ).removeClass('clicked');
				$('#iamsellingbuying-steps').html(iamsellingbuying_response10);
				$.fancybox([ { href : '#iamsellingbuying-steps' } ]);
			}
		});
	});	
});
</script>