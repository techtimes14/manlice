<?php
use Cake\Routing\Router;
$session = $this->request->session();
$this->assign('needEditor', true);
$this->assign('editor_id', '.editorClass');
?>
<style>.btn-default{width:auto !important;} .col-sm-1 .checkbox{display:block;} .attireMainNav{display:none;}</style>
<article class="content item-editor-page">
   <div class="title-block">
      <h3 class="title">
          <?php echo ($id) ? 'Edit Category' : 'Add New Category'; ?>
         <span class="sparkline bar" data-type="bar"></span>
      </h3>
   </div>
   <?php echo $this->Flash->render() ?>
   <?php echo $this->Form->create($news_categories,['id' => 'login-form', 'novalidate' => 'novalidate', 'enctype'=>'multipart/form-data']); ?>
      <div class="card card-block">
         <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Title:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('title', ['required' => true, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Title' ]); ?>
            </div>
         </div>
		<?php
		if( (array_key_exists('change-status',$session->read('permissions.'.strtolower('News')))) && $session->read('permissions.'.strtolower('News').'.'.strtolower('change-status'))==1 ){
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
                <?php
                if($id)
                    echo $this->Form->button('Update',['type' => 'submit','class' => 'btn btn-primary']);
                else
                    echo $this->Form->button('Add',['type' => 'submit','class' => 'btn btn-primary']);
                ?>
                &nbsp;
				<a href="<?php echo Router::url('/admin/news/list-category',true); ?>" class="btn btn-primary">Cancel</a>
            </div>
         </div>
      </div>
   <?php echo $this->Form->end(); ?>
</article>