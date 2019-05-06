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
					<label class="inputRadio" id="iamsellingbuyingprice_<?php echo $val_price['id'];?>">
						<input type="radio" name="iamsellingbuying_price" id="iamsellingbuying_price" value="<?php echo $val_price['id'];?>" class="iamsellingbuying_next8" />
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
	$('.iamsellingbuying_next8').click(function(e){
		var iamsellingbuying_price_id1	= this.value;
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url : website_url+'users/iamsellingbuying_step9',
			data: {'iamsellingbuying_price_id1':iamsellingbuying_price_id1},
			beforeSend: function() {
				$('.iamsellingbuying_next8').parent( "#iamsellingbuyingprice_"+iamsellingbuying_price_id1 ).addClass('clicked');
			},
			success: function(iamsellingbuying_response8){
				$('.iamsellingbuying_next8').parent( "#iamsellingbuyingprice_"+iamsellingbuying_price_id1 ).removeClass('clicked');
				$('#iamsellingbuying-steps').html(iamsellingbuying_response8);
				$.fancybox([ { href : '#iamsellingbuying-steps' } ]);
			}
		});
	});	
});
</script>