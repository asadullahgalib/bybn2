@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update Photo Gallery
          @else
          Add Photo Gallery
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.photo.view')}}"><i class="fa fa-list"></i> Photo Gallery List</a>
        </h3>
      </div>

      <div class="card-body">
          <form method="post" action="{{!empty($editData->id) ? route('web-site.photo.update',$editData->id) : route('web-site.photo.store')}}" enctype="multipart/form-data" id="myForm">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="image">Image <span style="color:red">(320px X 280px)</span></label>
                <input type="file" name="image" class="form-control" id="image">
              </div>
              <div class="form-group col-md-4">
                <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/gallery_images/'.@$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-sm">
              @if(isset($editData))
              @lang('Update')
              @else
              @lang('Submit')
              @endif
            </button>
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
          photo_folder_id: {
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