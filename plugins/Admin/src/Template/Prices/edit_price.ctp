<?php use Cake\Routing\Router; $session = $this->request->session();?>
<article class="content item-editor-page">
   <div class="title-block">
      <h3 class="title">
         Edit
         <span class="sparkline bar" data-type="bar"></span>
      </h3>
   </div>
   <?php echo $this->Flash->render() ?>
   <?php echo $this->Form->create($existing_price,['id' => 'login-form', 'novalidate' => 'novalidate', 'enctype'=>'multipart/form-data']); ?>
      <div class="card card-block">
         <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Type:
            </label>
            <div class="col-sm-2">
               <?php echo $this->Form->input('price_type', ['id' => 'price_type', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Type', 'options' => ['U' => 'Under', 'B' => 'Between', 'A' => 'Above']]); ?>
            </div>
         </div>
		 <div class="form-group row" id="price_1_div" <?php if($existing_price['price_type']=='U' || $existing_price['price_type']=='B')echo 'style="display:block;"';else echo 'style="display:none;"';?>>
            <label class="col-sm-2 form-control-label text-xs-right">
               Price 1:
            </label>
            <div class="col-sm-10">
				<div style="width:10px;float:left;margin-top:7px;">$</div>
				<div style="width:120px;float:left;"><?php echo $this->Form->input('price_1', ['id' => 'price_1', 'type' => 'number', 'required' => true, 'min' => 0, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Price 1' ]); ?>
				</div>
				<div style="width:10px;float:left;margin-top:7px;"></div>               
            </div>
         </div>
		 <div class="form-group row" id="price_2_div" <?php if($existing_price['price_type']=='A' || $existing_price['price_type']=='B')echo 'style="display:block;"';else echo 'style="display:none;"';?>>
            <label class="col-sm-2 form-control-label text-xs-right">
               Price 2:
            </label>
            <div class="col-sm-10">
				<div style="width:10px;float:left;margin-top:7px;">$</div>
				<div style="width:120px;float:left;"><?php echo $this->Form->input('price_2', ['id' => 'price_2', 'type' => 'number', 'required' => true, 'min' => 0, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Price 2' ]); ?>
				</div>
				<div style="width:10px;float:left;margin-top:7px;"></div>
            </div>
         </div>
		 <div class="form-group row">
			<label class="col-sm-2 form-control-label text-xs-right">Unit:</label>
			<div class="col-sm-2">
				<?php echo $this->Form->input('price_unit', ['required' => true, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Unit', 'options' => ['K' => 'K', 'M' => 'M']]); ?>
			</div>
		 </div>
		<?php
		if( (array_key_exists('change-status',$session->read('permissions.'.strtolower('Prices')))) && $session->read('permissions.'.strtolower('Prices').'.'.strtolower('change-status'))==1 ){
		?>
		 <div class="form-group row">
			<label class="col-sm-2 form-control-label text-xs-right">Status:</label>
			<div class="col-sm-2">
				<?php echo $this->Form->input('status', ['required' => true, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Status', 'options' => ['A' => 'Active', 'I' => 'Inactive']]); ?>
			</div>
		 </div>
		<?php
		}
		?>
         <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
               <?php echo $this->Form->button('Update',['type' => 'submit','class' => 'btn btn-primary']); ?>&nbsp;
				<a href="<?php echo Router::url('/admin/prices/list-data',true); ?>" class="btn btn-primary">Cancel</a>
            </div>
         </div>
      </div>
   <?php echo $this->Form->end(); ?>
</article>
<script>
$(document).ready(function(){
	$('#price_type').change(function(e){
		var selected_price_type = this.value;
		if( selected_price_type == 'U' ){
			$('#price_1').attr('required',true);
			$('#price_1_div').show();
			$('#price_2').removeAttr('required');
			$('#price_2_div').hide();
		}
		else if( selected_price_type == 'B' ){
			$('#price_1').attr('required',true);
			$('#price_1_div').show();
			$('#price_2').attr('required',true);
			$('#price_2_div').show();
		}
		else if( selected_price_type == 'A' ){
			$('#price_1').removeAttr('required');
			$('#price_1_div').hide();
			$('#price_2').attr('required',true);
			$('#price_2_div').show();
		}
	});
});
</script>