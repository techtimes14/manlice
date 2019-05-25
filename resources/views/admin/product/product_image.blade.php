@extends('layouts.admin.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
                  <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
              @endif
          @endforeach
		      <form action="{{ route('admin.product.store',$products->id)}}" enctype="multipart/form-data" class="dropzone" id="dropzone" method="POST">
            @csrf
            <!-- <div class="fallback">
              <input name="file" type="files" multiple accept="image/jpeg, image/png, image/jpg" />
            </div> -->
          </form>

          <small>{{ __('Please upload image exactly or larger than 490px X 517px for best view.') }}</small><br />

          <div class="form-group defultImageMessage">
          &nbsp;
          </div>
          <div class="row">
            @if(count($products->product_image))
              @foreach($products->product_image as $images)
              <div class="col-lg-2 col-6 image_wrap">
                @if(file_exists(public_path('/uploaded/product/'.$images->name)))
                    {!! '<img class="img-thumbnail img-fluid" src="' . URL::to('/') . '/uploaded/product/' . $images->name . '" >' !!}
                    @if($images->default_image == 'Y')
                      {{ Form::radio('default_image', 'Y' , true, array('style'=>'cursor: pointer;','class'=>'default_img image_hidden_id','data-id'=>base64_encode($images->id),'data-name'=>base64_encode($products->id))) }}
                    @else
                      {{ Form::radio('default_image', 'N' , false, array('style'=>'cursor: pointer;','class'=>'default_img image_hidden_id','data-id'=>base64_encode($images->id),'data-name'=>base64_encode($products->id))) }}
                    @endif

                    <a onclick="return confirm('Are you sure you want to delete the product image?')" href="{{ route('admin.product.delete_product_image', [base64_encode($images->id), base64_encode($products->id)]) }}">
                      <i class="fas fa-trash-alt"></i>
                    </a>

                @else
                    {!! '<img style="width:200px; height: 200px;" class="img-thumbnail img-fluid" src="' . URL::to('/') . '/images/no_images.png" >' !!}
                    @if($images->default_image == 'Y')
                      {{ Form::radio('default_image', 'Y' , true, array('style'=>'cursor: pointer;','class'=>'default_img','data-id'=>base64_encode($images->id),'data-name'=>base64_encode($products->id))) }}
                    @else
                      {{ Form::radio('default_image', 'N' , false, array('style'=>'cursor: pointer;','class'=>'default_img','data-id'=>base64_encode($images->id),'data-name'=>base64_encode($products->id))) }}
                    @endif

                    <a onclick="return confirm('Are you sure you want to delete the product image?')" href="{{ route('admin.product.delete_product_image', [base64_encode($images->id), base64_encode($products->id)]) }}">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                @endif
              </div>
              @endforeach
            @endif
          </div>

			</div>
		</div>
	</div>
</div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<style type="text/css">
    .dropzone {
        border:2px dashed #999999;
        border-radius: 10px;
    }
    .dropzone .dz-default.dz-message {
        height: 171px;
        background-size: 132px 132px;
        margin-top: -101.5px;
        background-position-x:center;

    }
    .dropzone .dz-default.dz-message span {
        display: block;
        margin-top: 145px;
        font-size: 20px;
        text-align: center;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){ $(".font-weight-light").hide(); }, 6000);

        $('.defultImageMessage').hide();

        $("input[name=default_image]").on('change', function() {
            var image_id = $(this).attr('data-id');
            var product_id = $(this).attr('data-name');
            var ajax_url = '{{ route("admin.product.make_default_image") }}';
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                url: ajax_url,
                method: 'post',
                data: {
                    image_id: image_id,
                    product_id: product_id,
                },
                success: function(data){
                    if(data == 1){
                      $('.defultImageMessage').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Default image successfully updated.</div>');
                      $('.defultImageMessage').show();
                    }else{
                      $('.defultImageMessage').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Danger!</strong> Error in processing request for update default image.</div>');
                      $('.defultImageMessage').show();
                    }
                    setTimeout(function(){ $('.defultImageMessage').hide(); }, 4000);
                }
            });
        });
    });

    Dropzone.options.dropzone =
     {
        maxFiles: '<?php echo (5 - count($products->product_image)); ?>',
        maxThumbnailFilesize: '<?php echo (5 - count($products->product_image)); ?>',
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            var file_name = file.name.split('.');
            var extension = file_name[1];
           return 'flower-product-'+(Math.floor(Math.random() * 999999) + 100000)+time+'.'+extension;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file)
        {
            var name = file.upload.filename;

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route("admin.product.image_delete") }}',
                data: {filename: name, product_id: product_id},
                success: function (data){
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        init: function () {
          var totalFiles = 0,
          completeFiles = 0;
          this.on("addedfile", function (file) {
              totalFiles += 1;
          });
          this.on("removed file", function (file) {
              totalFiles -= 1;
          });
          this.on("complete", function (file) {
              completeFiles += 1;
              if (completeFiles === totalFiles) {
                  location.reload();
              }
          });

          this.on("maxfilesexceeded", function(file){
              alert("Add upto 5 images.");
              this.removeFile(file);
          });
        },
        success: function(file, response)
        {
            // if(response.success){
            //   location.reload();
            // }
            console.log(response);
        },
        error: function(file, response)
        {
           return false;
        }
    };
</script>

@endsection
