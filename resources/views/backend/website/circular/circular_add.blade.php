@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Circular</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Circular</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update Circular
          @else
          Add Circular
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.circular.view')}}"><i class="fa fa-list"></i> Circular List</a>
         </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.circular.update',$editData->id):route('web-site.circular.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Title in English <span style="font-weight: bold;color: red;">*</span> </label>
              <input type="text" name="title_en" value="{{@$editData->title_en}}" class="form-control">
            </div>
            <div class="form-group col-md-12">
              <label>Title in Bangla <span style="font-weight: bold;color: red;">*</span></label>
              <input type="text" name="title_bn" value="{{@$editData->title_bn}}" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label>Circular Status <span style="font-weight: bold;color: red;">*</span></label>
              <select name="status" class="form-control select2">
                <option value="">Select Status</option>
                <option value="1" {{(@$editData->status=="1")?"selected":""}}>Active</option>
                <option value="0" {{(@$editData->status=="0")?"selected":""}}>Inactive</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Image</label>
              <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/circular_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 200px;height: 250px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-2">
              <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
            </div>
          </div>
        </form>

      </div><!-- /.card-body -->

    </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          title_en: {
            required: true,
          },
          title_bn: {
            required: true,
          },
          status: {
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