<?php
use Cake\Routing\Router;
$session = $this->request->session();
?>
<article class="content item-editor-page">
   <div class="title-block">
      <h3 class="title">
         View Details
         <span class="sparkline bar" data-type="bar"></span>
      </h3>
   </div>
      <div class="card card-block">
         <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Full Name:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('full_name', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertyforsaleDetails['user']['full_name'], 'readonly'=>true ]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Email:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('email', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertyforsaleDetails['user']['email'], 'readonly'=>true ]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Phone:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('phone', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertyforsaleDetails['user']['phone'], 'readonly'=>true ]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Price:
            </label>
            <div class="col-sm-10">
				<?php
				$price2 = '';
				if($propertyforsaleDetails['price']['price_type']=='U')$price2 = 'Under ';else if($propertyforsaleDetails['price']['price_type']=='B')$price2 = '';else $price2 = 'Above ';
				if($propertyforsaleDetails['price']['price_1'] != NULL)$price2 .= '$'.$propertyforsaleDetails['price']['price_1'].'K';
				if($propertyforsaleDetails['price']['price_type']=='B')$price2 .= ' - ';
				if($propertyforsaleDetails['price']['price_2'] != NULL)$price2 .= '$'.$propertyforsaleDetails['price']['price_2'].'K';
				echo $this->Form->input('price', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $price2, 'readonly'=>true]);
				?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Street Address:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('street_address', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertyforsaleDetails['street_address'], 'readonly'=>true]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Zip Code:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('zip_code', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertyforsaleDetails['zip_code'], 'readonly'=>true]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               City:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('city', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertyforsaleDetails['city'], 'readonly'=>true]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               State:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('state_code', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertyforsaleDetails['state_code'], 'readonly'=>true]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Property Type:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('state_code', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertyforsaleDetails['property']['title'], 'readonly'=>true]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Created On:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('state_code', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => date('dS M Y',strtotime($propertyforsaleDetails['created'])), 'readonly'=>true]); ?>
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
               <a href="<?php echo Router::url('/admin/submissions/property-sell-list-data',true); ?>" class="btn btn-primary">Back</a>
            </div>
         </div>
      </div>
</article>