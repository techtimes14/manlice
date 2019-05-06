<?php use Cake\Routing\Router; $session = $this->request->session();?>
<article class="content items-list-page">
   <div class="title-search-block">
      <div class="title-block">
         <div class="row">
            <div class="col-md-7">
				<h3 class="title">
					Matching Properties To Sell&nbsp;&nbsp;
					<a href="<?php echo Router::url('/admin/submissions/property-buy-list-data',true); ?>" class="btn btn-primary btn-sm rounded-s">Back</a>
				</h3>
            </div>
         </div>
      </div>
   </div>
   <div class="card items">
   <?php echo $this->Flash->render() ?>
      <ul class="item-list striped">
         <li class="item item-list-header hidden-sm-down">
            <div class="item-row">
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
                  <div> <span><a>Property Type</span></div>                  
               </div>
			   <div class="item-col item-col-header fixed item-col-actions-dropdown" style="width:0;flex-basis:0 !important;"> <span><a></a></span> </div>
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
                       <div class="item-col item-col-name">
							<div class="item-heading">Full Name</div>
							<div><?php echo $propertyforsaleDetail['user']['full_name'];?></div>
                       </div>

						<div class="item-col item-col-name">
							<div class="item-heading">Price</div>
							<div>
							<?php
							if($propertyforsaleDetail['price']['price_type']=='U')echo 'Under ';else if($propertyforsaleDetail['price']['price_type']=='B')echo '';else 'Above ';
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
					   <div class="item-col fixed item-col-actions-dropdown" style="width:0;flex-basis:0 !important;"></div>
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
if( ((array_key_exists('change-status',$session->read('permissions.'.strtolower('BannerSections')))) && $session->read('permissions.'.strtolower('BannerSections').'.'.strtolower('change-status'))==1) && ((array_key_exists('delete-banner',$session->read('permissions.'.strtolower('BannerSections')))) && $session->read('permissions.'.strtolower('BannerSections').'.'.strtolower('delete-banner'))==1) ){
?>
	var selectedCheckBox = new checkbox(<?php echo $this->Paginator->param('count'); ?>,'deleteAll','Delete','activeAll','Active','inactiveAll','Inactive');
<?php
}else if( ((array_key_exists('change-status',$session->read('permissions.'.strtolower('BannerSections')))) && $session->read('permissions.'.strtolower('BannerSections').'.'.strtolower('change-status'))==1) && ((!array_key_exists('delete-banner',$session->read('permissions.'.strtolower('BannerSections')))) && $session->read('permissions.'.strtolower('BannerSections').'.'.strtolower('delete-banner'))!=1) ){
?>
	var selectedCheckBox = new checkbox(<?php echo $this->Paginator->param('count'); ?>,'activeAll','Active','inactiveAll','Inactive');
<?php
}
else if( ((!array_key_exists('change-status',$session->read('permissions.'.strtolower('BannerSections')))) && $session->read('permissions.'.strtolower('BannerSections').'.'.strtolower('change-status'))!=1) && ((array_key_exists('delete-banner',$session->read('permissions.'.strtolower('BannerSections')))) && $session->read('permissions.'.strtolower('BannerSections').'.'.strtolower('delete-banner'))==1) ){
?>
	var selectedCheckBox = new checkbox(<?php echo $this->Paginator->param('count'); ?>,'deleteAll','Delete');
<?php
}
?>

function change_status(id,status){
	swal({
	  title: "Are you sure?",
	  type: "warning",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  confirmButtonClass: 'btn-warning',
	  confirmButtonText: "Yes",
	  showLoaderOnConfirm: true
	}, function () {
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?php echo Router::url("/admin/banner-sections/change-status/",true); ?>',
			data: {id: id, status: status},
			success: function(result) {
				if(result.type == 'success'){
					setTimeout(function () {
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
function delete_banner(id){
	swal({
	  title: "Are you sure?",
	  type: "error",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  confirmButtonClass: 'btn-danger',
	  confirmButtonText: "Yes",
	  showLoaderOnConfirm: true
	}, function () {
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?php echo Router::url("/admin/banner-sections/delete-banner/",true); ?>',
			data: {id: id},			
			success: function(result) {
				if(result.type == 'success'){
					setTimeout(function () {
						$('#row_id_'+result.deleted_id).remove();
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
				url: '<?php echo Router::url("/admin/banner-sections/delete-multiple/",true); ?>',
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
function activeAll(){
	swal({
          title: "Are you sure?",
          type: "info",
          showCancelButton: true,
		  closeOnConfirm: false,
          confirmButtonClass: 'btn-info',
          confirmButtonText: 'Yes',
		  showLoaderOnConfirm: true
        },
        function(){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo Router::url("/admin/banner-sections/active-multiple/",true); ?>',
				data: {
					id: selectedCheckBox.id
				},
				success: function(result) {
					if(result != ''){
						setTimeout(function () {
							swal({
								title: "Banner(s) activated successfully",
								type: "success",
								confirmButtonText: "OK",
								},
								function(){
									window.location.reload();
								});
						}, 500);						
					}else{
						swal("No banner(s) to mark as active", "", "warning");
					}
			   }
			});
        });
}
function inactiveAll(){
	swal({
          title: "Are you sure?",
          type: "warning",
          showCancelButton: true,
		  closeOnConfirm: false,
          confirmButtonClass: 'btn-warning',
          confirmButtonText: 'Yes',
		  showLoaderOnConfirm: true
        },
        function(){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo Router::url("/admin/banner-sections/inactive-multiple/",true); ?>',
				data: {
					id: selectedCheckBox.id
				},
				success: function(result) {
					if(result != ''){
						setTimeout(function () {
							swal({
								title: "Banner(s) inactivated successfully",
								type: "success",
								confirmButtonText: "OK",
								},
								function(){
									window.location.reload();
								});
						}, 500);						
					}else{
						swal("No banner(s) to mark as inactive", "", "warning");
					}
				}
			});
        });
}
</script>