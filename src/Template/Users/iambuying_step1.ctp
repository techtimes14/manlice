<?php use Cake\Routing\Router; ?>
<div class="popForm_body">
	<h2 class="subheading">What price range are you hoping to buy at?</h2>
	<form>
		<div class="">
		<?php
		if(!empty($all_prices)){
		?>
			<ul class="ul row radioBar">
		<?php
			foreach($all_prices as $key_price => $val_price){
		?>
				<li class="col-sm-3">
					<label class="inputRadio" id="iambuying_price_<?php echo $val_price['id'];?>">
						<input type="radio" name="iambuying_price" id="iambuying_price" value="<?php echo $val_price['id'];?>" class="iambuying_next1" />
						<span>
						<?php
						if($val_price['price_type']=='U')
							echo 'Under $'.$val_price['price_1'].$val_price['price_unit'];
						else if($val_price['price_type']=='B')
							echo '$'.$val_price['price_1'].$val_price['price_unit'].' - $'.$val_price['price_2'].$val_price['price_unit'];
						else
							echo '$'.$val_price['price_2'].$val_price['price_unit'].'+';
						?>
						</span>
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
	$('.iambuying_next1').click(function(e){
		var iambuying_price_id	= this.value;
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iambuying_step2',
			data: {'iambuying_price_id':iambuying_price_id},
			beforeSend: function() {
				$('#iambuying_price_'+iambuying_price_id).addClass('clicked');
			},
			success: function(imbuying_response1){
				$('#iambuying_price_'+iambuying_price_id).removeClass('clicked');
				$('#iambuying-steps').html(imbuying_response1);
				$.fancybox({ href : '#iambuying-steps', helpers:{overlay:{closeClick:false}} });
			}
		});
	});	
});
</script>