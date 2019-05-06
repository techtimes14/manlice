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
				<label id="iamsellingbuyingproperty_<?php echo $val_property['id'];?>">
					<input type="radio" name="iamsellingbuying_property" id="iamsellingbuying_property" value="<?php echo $val_property['id'];?>" class="iamsellingbuying_next2">
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
	$('.iamsellingbuying_next2').click(function(e){
		var iamsellingbuying_property_id = this.value;
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamsellingbuying_step3',
			data: {'iamsellingbuying_property_id':iamsellingbuying_property_id},
			beforeSend: function() {
				$('.iamsellingbuying_next2').parent( "#iamsellingbuyingproperty_"+iamsellingbuying_property_id ).addClass('clicked');
			},
			success: function(iamsellingbuying_response2){
				$('.iamsellingbuying_next2').parent( "#iamsellingbuyingproperty_"+iamsellingbuying_property_id ).removeClass('clicked');
				$('#iamsellingbuying-steps').html(iamsellingbuying_response2);
				$.fancybox({ href : '#iamsellingbuying-steps' });
			}
		});
	});	
});
</script>