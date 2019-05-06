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
					<label class="inputRadio" id="iamsellingbuyingmortgage_<?php echo $val_mortgage['id'];?>">
						<input type="radio" name="iamsellingbuying_mortgage" id="iamsellingbuying_mortgage" value="<?php echo $val_mortgage['id'];?>" class="iamsellingbuying_next11" />
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
	$('.iamsellingbuying_next11').click(function(e){
		var iamsellingbuying_mortgage_id	= this.value;
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamsellingbuying_step12',
			data: {'iamsellingbuying_mortgage_id':iamsellingbuying_mortgage_id},
			beforeSend: function() {
				$('.iamsellingbuying_next11').parent( "#iamsellingbuyingmortgage_"+iamsellingbuying_mortgage_id ).addClass('clicked');
			},
			success: function(iamsellingbuying_response11){
				$('.iamsellingbuying_next11').parent( "#iamsellingbuyingmortgage_"+iamsellingbuying_mortgage_id ).removeClass('clicked');
				$('#iamsellingbuying-steps').html(iamsellingbuying_response11);
				$.fancybox([ { href : '#iamsellingbuying-steps' } ]);
			}
		});
	});	
});
</script>