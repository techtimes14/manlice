@extends('layouts.admin.app')

@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
</style>
<style type="text/css">
.dropdown-menu{font-size: 0.80rem;}
</style>

<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
                  <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
              @endif
          @endforeach

          <?php
          if($product_video_details != null){
            $iframe_code      = $product_video_details->iframe_code;
            $product_video_id = $product_video_details->id;
          }else{
            $iframe_code      = null;
            $product_video_id = 0;
          }
          ?>

          {!! Form::model($products, ['route' => ['admin.product.video', base64_encode($products->id)], 'id' => 'productVideoEdit', 'class' => 'cmxform', 'method' => 'PUT', 'novalidate'] ) !!}
            <input type="hidden" name="product_video_id" id="product_video_id" value="{{$product_video_id}}">
            <h4 class="card-title">{{ __('Add/Update Video Code') }}</h4>
            <fieldset>
              <div class="form-group">
                <label for="iframe_code">{{ __('Video Iframe Code') }}<!--<span class="text-danger">&#042;</span>--></label>
                {!! Form::textarea('iframe_code', $iframe_code, array('class'=>'form-control', 'placeholder' => __('Enter Iframe Code'), 'id' => 'iframe_code')) !!}
                @if ($errors->has('iframe_code'))
                  <span class="error">
                    {{ $errors->first('iframe_code') }}
                  </span>
                @endif
              </div>
              
              <input class="btn btn-primary" type="submit" value="Submit">
              <a class="btn btn-info" href="{{ route('admin.product.list') }}">Cancel</a>
            </fieldset>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
<div id="image_crop" class="modal modal-bg-black fade add_team1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title common common1">
                    Profile Image
                </h2>
            </div>
            <div class="modal-body">
                <img src="" alt="noimage" id="image-preview">
                <button type="button" id="image-button" class="submit_btn crop_button" style="display: none;">Crop</button>
                 <button type="button" class="submit_btn crop_button cancel_crop">Cancel</button>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$.validator.setDefaults({
        submitHandler: function(form) {
            form.submit();
        }
});
$(function() {
    // validate the comment form when it is submitted
    $("#productAdd").validate({
      ignore: [],
      // errorPlacement: function(label, element) {
      //  label.addClass('mt-2 text-danger');
      //  label.insertAfter(element);
      // },
      // highlight: function(element, errorClass) {
      //  $(element).parents('.form-group').addClass('has-danger')
      //  $(element).addClass('form-control-danger')
      // }
    });
});
</script>

@endsection