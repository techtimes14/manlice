<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<?php
	if(!empty($all_properties)){
	?>
	<ul class="ul row col4">
	<?php
		foreach($all_properties as $key_property => $val_property){
			$property_image = '';
			if($val_property['image'] !=''){
				$property_image = Router::url('/uploads/property/thumb/', true).$val_property['image'];
			}else{
				$property_image = Router::url('/images/', true).'no-image-available.png';
			}
	?>
		<li class="col-sm-3">
			<div class="form_radio">
				<label id="iamsellingproperty_<?php echo $val_property['id'];?>">
					<input type="radio" name="iamselling_property" id="iamselling_property" value="<?php echo $val_property['id'];?>" class="iamselling_next2">
					<div class="formIcon"><img src="<?php echo $property_image;?>" alt=""></div>
					<span><?php echo $val_property['title'];?></span>
				</label>
			</div>
		</li>
	<?php
		}
	?>
	</ul>
	<?php
	}
	?>
</div>
<script>
$(function () {	
	var website_url = $('#website_url').val();
	$('.iamselling_next2').click(function(e){
		var iamselling_property_id	= this.value;
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamselling_step3',
			data: {'iamselling_property_id':iamselling_property_id},
			beforeSend: function() {
				$('.iamselling_next2').parent( "#iamsellingproperty_"+iamselling_property_id ).addClass('clicked');
			},
			success: function(iamselling_response2){
				$('.iamselling_next2').parent( "#iamsellingproperty_"+iamselling_property_id ).removeClass('clicked');
				$('#iamselling-steps').html(iamselling_response2);
				$.fancybox({ href : '#iamselling-steps' });
			}
		});
	});	
});
</script>