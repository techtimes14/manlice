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
               <?php echo $this->Form->input('full_name', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertytobuyDetails['user']['full_name'], 'readonly'=>true ]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Email:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('email', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertytobuyDetails['user']['email'], 'readonly'=>true ]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Phone:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('phone', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertytobuyDetails['user']['phone'], 'readonly'=>true ]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Price:
            </label>
            <div class="col-sm-10">
				<?php
				$price2 = '';
				if($propertytobuyDetails['price']['price_type']=='U')$price2 = 'Under ';else if($propertytobuyDetails['price']['price_type']=='B')$price2 = '';else $price2 = 'Above ';
				if($propertytobuyDetails['price']['price_1'] != NULL)$price2 .= '$'.$propertytobuyDetails['price']['price_1'].'K';
				if($propertytobuyDetails['price']['price_type']=='B')$price2 .= ' - ';
				if($propertytobuyDetails['price']['price_2'] != NULL)$price2 .= '$'.$propertytobuyDetails['price']['price_2'].'K';
				echo $this->Form->input('price', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $price2, 'readonly'=>true]);
				?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               City:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('city', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertytobuyDetails['city'], 'readonly'=>true]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               State:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('state_code', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertytobuyDetails['state_code'], 'readonly'=>true]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Plan:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('plan', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertytobuyDetails['plan']['title'], 'readonly'=>true]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
				Mortgage Status:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('mortgage_status', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => $propertytobuyDetails['mortgage_status']['title'], 'readonly'=>true]); ?>
            </div>
         </div>		 
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Created On:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('state_code', ['type' => 'text', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'value' => date('dS M Y',strtotime($propertytobuyDetails['created'])), 'readonly'=>true]); ?>
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
               <a href="<?php echo Router::url('/admin/submissions/property-buy-list-data',true); ?>" class="btn btn-primary">Back</a>
            </div>
         </div>
      </div>
</article>