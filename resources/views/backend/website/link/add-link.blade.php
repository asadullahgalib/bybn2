@extends('backend.layouts.master')
@section('content')

  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update Project
          @else
          Add Project
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.link.view')}}"><i class="fa fa-list"></i> Project List</a>
        </h3>
      </div>

      <div class="card-body">
          <form method="post" action="{{(@$editData)?route('web-site.link.update',$editData->id):route('web-site.link.store')}}" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Project Title <span style="color: red;">*</span> </label>
                <input type="text" name="title_en" value="{{@$editData->title_en}}" class="form-control form-control-sm">
              </div>
              <div class="form-group col-md-3">
                <label for="image">Image <span style="color:red">(500px X 400px)</span></label>
                <input type="file" name="image" class="form-control" id="image">
              </div>
              <div class="form-group col-md-3">
                <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/project_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
              </div>
              <!-- <div class="form-group col-md-6">
                <label>Icon <span style="color: red;">*</span> </label>
                <input type="text" name="icon" value="{{@$editData->icon}}" class="form-control form-control-sm">
              </div> -->
              <div class="form-group col-md-12">
                <label>Description <span style="color: red;">*</span> </label>
                <textarea name="description_en" class="form-control form-control-sm">{{@$editData->description_en}}</textarea>
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary btn-sm">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
            </div>
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
          service_category_id: {
            required: true,
          },
          title_en: {
            required: true,
          },
          icon: {
            required: true,
          },
          description_en: {
            required: true,
          },
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