<?php use Cake\Routing\Router; $session = $this->request->session();?>
<article class="content item-editor-page">
   <div class="title-block">
      <h3 class="title">
         Edit Testimonial
         <span class="sparkline bar" data-type="bar"></span>
      </h3>
   </div>
   <?php echo $this->Flash->render() ?>
   <?php echo $this->Form->create($existing_testimonial,['id' => 'login-form', 'novalidate' => 'novalidate', 'enctype'=>'multipart/form-data']); ?>
      <div class="card card-block">
         <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Name:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('name', ['required' => true, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Name' ]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Designation:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('designation', ['required' => false, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Designation' ]); ?>
            </div>
         </div>
		 <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Short Description:
            </label>
            <div class="col-sm-10">
               <?php echo $this->Form->input('short_description', ['type' => 'textarea', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'placeholder' => 'Short Description' ]); ?>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">
               Image:
            </label>
            <div class="col-sm-10">
				<?php echo $this->Form->input('image', ['type'=>'file', 'required' => true, 'label' => false, 'class' => 'form-control boxed', 'accept'=>"image/*", 'onchange' => 'image_preview(event)', 'autocomplete' => 'off']); ?>
				<p class="error_msg" style="margin-bottom:0;font-size:13px;"></p>
				<p class="sm_txt_nm">* Please upload jpg, png, jpeg files only, for best view please add above 98px x 98px image.</p>
				<?php
				$image = '';
				if($existing_testimonial->image !=''){
					if (file_exists(WWW_ROOT.'uploads/testimonial/'.$existing_testimonial->image)){
						$image = Router::url('/uploads/testimonial/thumb/', true).$existing_testimonial->image;
					}else{
						$image = Router::url('/images/', true).'no-avatar.png';
					}
				}else{
					$image = Router::url('/images/', true).'no-avatar.png';
				}
				?>
				<span id="pro_pic">
					<img src="<?php echo $image; ?>" width='98' height='98' style="border:1px solid #000; padding:5px;" />
				</span>
				<output id='image_view' style="padding-top:0px;display:block;"></output>
            </div>
         </div>
		<?php
		if( (array_key_exists('change-status',$session->read('permissions.'.strtolower('Testimonials')))) && $session->read('permissions.'.strtolower('Testimonials').'.'.strtolower('change-status'))==1 ){
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
				<a href="<?php echo Router::url('/admin/testimonials/list-data',true); ?>" class="btn btn-primary">Cancel</a>
            </div>
         </div>
      </div>
   <?php echo $this->Form->end(); ?>
</article>
<script>
function image_preview(evt){
	var files = evt.target.files;
	var num = 0;
	$('.preview_image').remove();
	$('.remove_preview_image').remove();
	
	var fileUpload = document.getElementById("image");
		
	// Loop through the FileList and render image files as thumbnails.
	for (var i = 0, f; f = files[i]; i++) {
		// Only process image files.
		if (!f.type.match('image.*')) {
			$('.error_msg').html('Please upload valid image file').css({'color':'#ff4444'});
			$('#image').val('');
			continue;
		}
		var reader = new FileReader();
		// Closure to capture the file information.
		reader.onload = (function(theFile) {
			return function(e) {
				//Initiate the JavaScript Image object.
                var image = new Image();
				
				//Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
				
				// Render thumbnail.
				var span = document.createElement('span');
				
				var uploaded_file_name = escape(theFile.name);
				var uploaded_file_extension = uploaded_file_name.substring(uploaded_file_name.lastIndexOf('.')+1);
				
				if(uploaded_file_extension=='png' || uploaded_file_extension=='jpg' || uploaded_file_extension=='jpeg' || uploaded_file_extension=='JPEG'){
					$('.error_msg').html('');
					
					image.onload = function () {
						var height = this.height;
						var width = this.width;
						if (width < 98 && height < 98) {
							$('.error_msg').html('Image size must be above or equals to 98px x 98px, your image size is: '+this.width + "px x " + this.height+'px').css({'color':'#ff4444'});
							$('#image').val('');
							return false;
						}else{
							span.innerHTML = 
							[
							'<img class="hide_shown_image preview_image" style="width: 98px; height:98px; border: 1px solid #000; margin: 5px 5px 5px 0; padding: 5px" src="', 
							e.target.result,
							'" title="', escape(theFile.name), 
							'"/><a class="remove_preview_image remove" href="javascript:remove_image();"  style="color:#db0e1e;"><i class="fa fa-trash-o "></i></a>'
							].join('');
						}
					};					
				}else{
					$('.error_msg').html('Please upload valid image file').css({'color':'#ff4444'});
					$('#image').val('');
				}
				document.getElementById('image_view').insertBefore(span, null);
			};
		})(f);
		// Read in the image file as a data URL.
		reader.readAsDataURL(f);
	}
}
function remove_image(){
	$('output#image_view span').remove();
	$('#image').val('');
}
</script>