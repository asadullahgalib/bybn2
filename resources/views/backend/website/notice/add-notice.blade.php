@extends('backend.layouts.master')
@section('content')

<div class="col-md-12" style="padding-top:40px">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        @if(isset($editData))
        Update News & Events
        @else
        Add News & Events
        @endif
        <a class="btn btn-success float-right btn-sm" href="{{route('web-site.notice.view')}}"><i class="fa fa-list"></i> News & Events List</a>
       </h3>
    </div>

    <div class="card-body">
      <form method="post" action="{{(@$editData)?route('web-site.notice.update',$editData->id):route('web-site.notice.store')}}" id="myForm" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Title <span style="color:red;font-weight: bold;">*</span> </label>
            <input type="text" name="title_en" value="{{@$editData->title_en}}" class="form-control form-control-sm">
          </div>
          <div class="form-group col-md-12">
            <label>Description <span style="color:red;font-weight: bold;">*</span> </label>
            <textarea name="description_en" class="form-control form-control-sm" rows="5">{{@$editData->description_en}}</textarea>
          </div>
          <div class="form-group col-md-3">
            <label>Date <span style="color:red;font-weight: bold;">*</span> </label>
            <input type="text" name="date" value="{{(@$editData->date !=null)?(date('d-m-Y',strtotime(@$editData->date))):old('date')}}" class="form-control form-control-sm singledatepicker" placeholder="DD-MM-YYYY" autocomplete="off" readonly="">
          </div>
          <div class="form-group col-md-4">
            <label for="image">Image <span style="color:red">(300px X 370px)</span></label>
            <input type="file" name="image" class="form-control" id="image">
          </div>
          <div class="form-group col-md-4">
            <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/notice_files/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
          </div>
          <div class="form-group col-md-2">
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
          title_en: {
            required: true,
          },
          date: {
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

  <script type="text/javascript">
    $(document).ready(function () {

      $('#docfile').change(function (e) { //show Slider Image before upload
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#showImage').attr('src', e.target.result);
          };
          reader.readAsDataURL(e.target.files[0]);
        });
    });
  </script>

@endsection