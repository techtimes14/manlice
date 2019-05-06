<?php use Cake\Routing\Router; $session = $this->request->session();?>
<article class="content items-list-page">
   <div class="title-search-block">
      <div class="title-block">
         <div class="row">
            <div class="col-md-7">
				<h3 class="title">
					Property For Sale
					<a></a>
				</h3>
            </div>
         </div>
      </div>
      <!--<div class="items-search">
         <form class="form-inline" action="<?php echo Router::url('/admin/bannerSections/list-data/',true); ?>" method="get">
            <div class="input-group">
               <span>
                  <input value="<?php if($this->request->query('search') !== null): echo $this->request->query('search'); endif; ?>" type="text" name="search" class="form-control boxed rounded-s" placeholder="Search by banner title..." />
                </span>
                <span class="input-group-btn">
                   <button class="btn btn-secondary rounded-s" type="submit">
                        <i class="fa fa-search"></i>
                   </button>
				   <a title="reset" class="btn btn-secondary rounded-s" href="<?php echo Router::url('/admin/banner-sections/list-data',true);?>">
						<i class="fa fa-refresh"></i>
					</a>
               </span>
            </div>
         </form>
      </div>-->
   </div>
   <div class="card items">
   <?php echo $this->Flash->render() ?>
      <ul class="item-list striped">
         <li class="item item-list-header hidden-sm-down">
            <div class="item-row">
				<div class="item-col fixed item-col-check">
				<?php if(!empty($propertyforsaleDetails)): ?>
                  <label class="item-check" id="select-all-items">
                      <input type="checkbox" class="checkbox">
                      <span></span>
                  </label> 
                <?php endif; ?>
				</div>
				<div class="item-col item-col-header item-col-name">
					<div> <span><a>Full Name</a></span> </div>
				</div>
				<div class="item-col item-col-header item-col-name">
					<div><span><a>Price</a></span></div>
               </div>
			   <div class="item-col item-col-header item-col-added">
                  <div><span><a>Street Address</a></span></div>
               </div>
			   <div class="item-col item-col-header item-col-added">
                  <div><span><a>Zip Code</a></span></div>
               </div>
			   <div class="item-col item-col-header item-col-status">
                  <div> <span><a>City</a></span> </div>                  
               </div>
			   <div class="item-col item-col-header item-col-status">
                  <div> <span><a>State</a></span></div>                  
               </div>
			   <div class="item-col item-col-header item-col-status">
                  <div> <span><a>Property Type</a></span></div>                  
               </div>
			   <!--<div class="item-col item-col-header item-col-status">
                  <div><span><a>Created</a></span></div>                  
               </div>-->
               <div class="item-col item-col-header fixed item-col-actions-dropdown"> <span><a>Action</a></span> </div>
            </div>
         </li>
         <?php
         if(count($propertyforsaleDetails)==0): ?>
            <li class="item">
				<div class="item-row">
				   <div>No record found</div>
				</div>
			 </li>
         <?php
         endif;
          foreach($propertyforsaleDetails as $propertyforsaleDetail): ?>
                <li class="item table-data" id="row_id_<?php echo $propertyforsaleDetail->id;?>">
                    <div class="item-row">
                       <div class="item-col fixed item-col-check"> <label class="item-check">
                          <input type="checkbox" class="checkbox" value="<?php echo $propertyforsaleDetail->id; ?>">
                          <span></span>
                          </label> 
                       </div>
                       <div class="item-col item-col-name">
							<div class="item-heading">Full Name</div>
							<div><?php echo $propertyforsaleDetail['user']['full_name'];?></div>
                       </div>

						<div class="item-col item-col-name">
							<div class="item-heading">Price</div>
							<div>
							<?php
							if($propertyforsaleDetail['price']['price_type']=='U')echo 'Under ';else if($propertyforsaleDetail['price']['price_type']=='B')echo '';else echo 'Above ';
							if($propertyforsaleDetail['price']['price_1'] != NULL)echo '$'.$propertyforsaleDetail['price']['price_1'].'K';
							if($propertyforsaleDetail['price']['price_type']=='B')echo ' - ';
							if($propertyforsaleDetail['price']['price_2'] != NULL)echo '$'.$propertyforsaleDetail['price']['price_2'].'K';
							?>
						  </div>
                       </div>
					   <div class="item-col item-col-name">
                          <div class="item-heading">Street Address</div>
                          <div><?php echo $propertyforsaleDetail['street_address'];?></div>
                       </div>
					   <div class="item-col item-col-name">
                          <div class="item-heading">Zip Code</div>
                          <div><?php echo $propertyforsaleDetail['zip_code'];?></div>
                       </div>
					   <div class="item-col item-col-status">
						  <div class="item-heading">City</div>
						  <div><?php echo $propertyforsaleDetail['city'];?></div>
					   </div>
					   <div class="item-col item-col-status">
						  <div class="item-heading">State</div>
						  <div><?php echo $propertyforsaleDetail['state_code'];?></div>
					   </div>
					   <div class="item-col item-col-status">
						  <div class="item-heading">Property Type</div>
						  <div><?php echo $propertyforsaleDetail['property']['title'];?></div>
					   </div>
					   <!--<div class="item-col item-col-status">
						  <div class="item-heading">Created</div>
						  <div><?php echo date('dS M Y',strtotime($propertyforsaleDetail->created)); ?></div>
					   </div>-->
						<div class="item-col fixed item-col-actions-dropdown">
							<div class="item-actions-dropdown active">
								<div class="item-actions-block options">
								<?php
								if( (array_key_exists('view-property-sell',$session->read('permissions.'.strtolower('Submissions')))) && $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('view-property-sell'))==1 ){
								?>
									<a class="edit" href="<?php echo Router::url("/admin/submissions/view-property-sell",true).'/'.base64_encode($propertyforsaleDetail->id);?>" title="View Details">
										<i class="fa fa-eye"></i>
									</a>
								<?php
								}
								echo '&nbsp;';
								if( (array_key_exists('matching-property-buy-list-data',$session->read('permissions.'.strtolower('Submissions')))) && $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('matching-property-buy-list-data'))==1 ){
								?>
									<a class="edit" href="<?php echo Router::url("/admin/submissions/matching-property-buy-list-data",true).'/'.base64_encode($propertyforsaleDetail->id).'/'.base64_encode($propertyforsaleDetail->state_code).'/'.base64_encode($propertyforsaleDetail->city).'/'.base64_encode($propertyforsaleDetail['price']['id']);?>" title="Match Properties">
										<i class="fa fa-home"></i>
									</a>
								<?php
								}								
								?>
								</div>
							</div>
						</div>
                    </div>
                 </li>
             <?php endforeach; ?>
      </ul>
   </div>
   <nav class="text-xs-left">
   <?php
	if($this->Paginator->param('count') != 0){
		$cnt = 1;
	}else{
		$cnt = 0;
	}
   $form = ($this->request->params['paging']['Submissions']['page'] * $this->request->params['paging']['Submissions']['perPage']) - $this->request->params['paging']['Submissions']['perPage']+$cnt; 
   $to = ($this->request->params['paging']['Submissions']['page'] * $this->request->params['paging']['Submissions']['perPage'])-$this->request->params['paging']['Submissions']['perPage'] + $this->request->params['paging']['Submissions']['current']; ?>

     Showing | Total records: <?php echo $form.'-'.$to.' | '.$this->Paginator->param('count'); ?>
   </nav>
	<nav class="text-xs-right">
		<ul class="pagination">
		<?php
			echo $this->Paginator->prev('Prev');
			echo $this->Paginator->numbers();
			echo $this->Paginator->next('Next');
		?>
		</ul>
	</nav>
</article>

<script type="text/javascript">
<?php
if( (array_key_exists('delete-property-sell',$session->read('permissions.'.strtolower('Submissions')))) && $session->read('permissions.'.strtolower('Submissions').'.'.strtolower('delete-property-sell'))==1 ){
?>
	var selectedCheckBox = new checkbox(<?php echo $this->Paginator->param('count'); ?>,'deleteAll','Delete');
<?php
}
?>
function deleteAll(){
	swal({
          title: "Are you sure?",
          type: "error",
          showCancelButton: true,
		  closeOnConfirm: false,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes',
		  showLoaderOnConfirm: true
        },
        function(){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo Router::url("/admin/submissions/delete-property-sell/",true); ?>',
				data: {
					id: selectedCheckBox.id
				},
				success: function(result) {
					if(result.type == 'success'){
						setTimeout(function () {
							if(result.deleted_ids.length == 1){
								$('#row_id_'+result.deleted_ids).remove();
							}else{
								var data = result.deleted_ids;
								$.each(data, function(index,value){
									$('#row_id_'+value).remove();
								});
							}
							swal({
								title: result.message,
								type: result.type,
								confirmButtonText: "OK",
								},
								function(){
									window.location.reload();
								});
						}, 200);
					}else{
						setTimeout(function () {
							swal(result.message, "", result.type);
						}, 200);
					}
				}
			});
        });
}
</script>