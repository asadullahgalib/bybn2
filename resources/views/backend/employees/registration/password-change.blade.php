@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Employee</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Employee</li>
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
            Password Change
          @else
            Add Employee
          @endif
          <a href="{{ route('human-resource.hrm.employee.registration.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Employee List</i></a>
        </h3>
      </div>

      <form role="form" action="{{route('human-resource.hrm.employee.registration.update.passowrd',$editData->id)}}" method="POST" enctype="multipart/form-data" id="MyForm">
        @csrf
          <div class="card-body">
            <div class="form-row">                   
              <div class="form-group col-md-4">
                <label for="name">Full Name <span style="color:red;font-weight:bold;">*</span></label>
                <input type="text" name="name" class="form-control"  value="{{ @$editData->name }}" readonly> 
              </div>
              <div class="form-group col-md-4">
                <label for="mobile">Mobile No/Email (For Login) <span style="color:red;font-weight:bold;">*</span></label>
                <input type="text" name="username" class="form-control"  value="{{ @$editData->username }}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="mobile">Mobile No (For SMS) <span style="color:red;font-weight:bold;">*</span></label>
                <input type="text" name="mobile" class="form-control" value="{{ @$editData->mobile }}" readonly> 
              </div>
              <div class="form-group col-md-4">
                <label for="mobile">Department</label>
                <input type="text"  class="form-control" value="{{ @$editData['department']['name'] }}" readonly> 
              </div>
              <div class="form-group col-md-4">
                <label for="mobile">Designation <span style="color:red;font-weight: bold;">*</span></label>
                <input type="text"  class="form-control" value="{{ @$editData['designation']['name'] }}" readonly> 
              </div>
              <div class="form-group col-md-4">
                <img src="{{(!empty(@$editData->image))?url('public/upload/employee_images/'.@$editData->image):url('public/upload/no_image.png')}}" class="form-control" style="width: 120px;">
              </div>
              <div class="form-group col-md-4">
                <label for="mobile">Password <span style="color:red;font-weight: bold;">*</span></label>
                <input type="password" name="password"  class="form-control"> 
              </div>
              <div class="form-group col-md-4" style="padding-top: 30px;">
                <button type="submit" class="btn btn-primary">@if(isset($editData)) Update @else Submit @endif</button>
              </div>
            </div>
          </div>
        </form>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#MyForm').validate({
      rules:{
        password:{
          required:true
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