@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
            Update Member
          @else
            Add Member
          @endif
          <a href="{{ route('human-resource.hrm.employee.registration.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Member List</i></a>
        </h3>
      </div>

      <form role="form" action="{{(@$editData)?route('human-resource.hrm.employee.registration.update',$editData->id):route('human-resource.hrm.employee.registration.store')}}" method="POST" enctype="multipart/form-data" id="MyForm">
        @csrf
          <div class="card-body">
            <div class="form-row">                   
              <div class="form-group col-md-4">
                <label for="name">Name <span style="color:red;font-weight:bold;">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ @$editData->name }}">   
              </div>
              <div class="form-group col-md-4">
                <label for="mobile">Designation <span style="color:red;font-weight:bold;">*</span></label>
                <input type="text" name="designation" class="form-control" value="{{ @$editData->designation }}">
              </div>
              <div class="form-group col-md-4">
                <label for="mobile">Email </label>
                <input type="text" name="email" class="form-control" value="{{ @$editData->email }}">
              </div>
              <div class="form-group col-md-2">
                <label for="mobile">Sorting Order <span style="color:red;font-weight:bold;">*</span></label>
                <input type="number" name="sort" class="form-control" value="{{ @$editData->sort }}"> 
              </div>
              <div class="form-group col-md-4">
                <label for="mobile">Mobile No </label>
                <input type="text" name="mobile" class="form-control" placeholder="Mobile No" value="{{ @$editData->mobile }}">
              </div>
              <div class="form-group col-sm-3">
                <label>Image <span style="color:red;">(300px X 300px)</span> </label>
                <input type="file" name="image" id="image" class="form-control">
              </div>
              <div class="form-group col-sm-3" style="z-index: 100;">
                <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/employee_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 150px; height: 150px" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary">@if(isset($editData)) Update @else Submit @endif</button>
              </div>
            </div>
          </div>
        </form>

    </div>
  </div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#MyForm').validate({
      rules:{
        name:{
          required:true
        },
        designation:{
          required:true
        },
        sort:{
          required:true
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