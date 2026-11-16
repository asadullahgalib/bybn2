@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update Slider
          @else
          Add Slider
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.slider.view')}}"><i class="fa fa-list"></i> Slider List</a>
         </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.slider.update',$editData->id):route('web-site.slider.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="image">Title </label>
              <input type="text" class="form-control" name="title" value="{{@$editData->title}}">
            </div>
            <div class="form-group col-md-3">
              <label for="image">Desktop Image <span style="color:red">(1920px X 770px)</span></label>
              <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group col-md-3">
              <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/slider_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-3">
              <label for="image">Mobile Image <span style="color:red">(991px X 770px)</span></label>
              <input type="file" name="image2" class="form-control" id="image2">
            </div>
            <div class="form-group col-md-3">
              <img id="showImage2" src="{{(!empty($editData->image2))?url('public/upload/slider_mobile_images/'.$editData->image2):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-6">
              <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
            </div>
          </div>
        </form>
        </form>
      </div><!-- /.card-body -->

    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          short_description: {
            required: true,
          },
          description: {
            required: true,
          }
        },
        messages: {
          
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
  
@endsection