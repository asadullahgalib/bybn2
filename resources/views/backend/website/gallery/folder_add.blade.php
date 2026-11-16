@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update Photo Folder
          @else
          Add Photo Folder
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.folder.view')}}"><i class="fa fa-list"></i> Photo Folder List</a>
        </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.folder.update',$editData->id):route('web-site.folder.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Folder Name</label>
              <input type="text" name="name_en" value="{{@$editData->name_en}}" class="form-control form-control-sm">
              <font style="color: red"> 
              {{($errors->has('name_en'))?($errors->first('name_en')):''}} 
              </font>    
            </div>
            <div class="form-group col-md-4">
              <label for="image">Image <span style="color:red">(868px X 640px)</span></label>
              <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group col-md-4">
              <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/folder_images/'.@$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
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
          name_en: {
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