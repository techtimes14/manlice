<?php use Cake\Routing\Router; $session = $this->request->session(); //$this->assign('hasDatepicker', true); ?>
<article class="content item-editor-page">
   <div class="title-block">
      <h3 class="title">
         Add User
         <span class="sparkline bar" data-type="bar"></span>
      </h3>
   </div>
   <?php echo $this->Flash->render() ?>
   <?php echo $this->Form->create($user,['id' => 'login-form', 'novalidate' => 'novalidate', 'enctype'=>'multipart/form-data']); ?>
      <div class="card card-block">
		<div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Full Name:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('full_name', ['required' => true, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'John Doe']); ?>
            </div>
        </div>
		<div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Email:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('email', ['required' => true, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Eg. example@example.com']); ?>
            </div>
         </div>
		<div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Password:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('password', ['type' => 'password', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Eg. admin@123']); ?>
            </div>
        </div>
		<?php
		if( (array_key_exists('change-status',$session->read('permissions.'.strtolower('Users')))) && $session->read('permissions.'.strtolower('Users').'.'.strtolower('change-status'))==1 ){
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
				   <?php echo $this->Form->button('Add',['type' => 'submit','class' => 'btn btn-primary']); ?>&nbsp;
				<a href="<?php echo Router::url('/admin/users/list-data',true); ?>" class="btn btn-primary">Cancel</a>
				</div>
			</div>
		</div>
   <?php echo $this->Form->end(); ?>
</article>
<script>
/*$(document).ready(function(){
    var $birthday = $( "#birthday" ).datepicker({'maxDate': 0, changeMonth: true, changeYear: true,	yearRange: "1950:+0"}).on('change', function(){
      //$birthday.datepicker( "option", "minDate", $.datepicker.parseDate( "mm/dd/YY", this.value ));
    });
});*/
</script>