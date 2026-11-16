@extends('backend.layouts.master')
@section('content')
<style type="text/css">
  .profile-userpic img {
    float: none;
    margin: 0 auto;
    width: 120px;
    height: 130px;
    background-color: #ddd;
    padding: 3px;
  }
</style>
<style type="text/css">
  .btn_active{
    background: #F70F9E;
    color: #fff;
    text-decoration: underline !important;
  }
</style>

  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-8 col-xs-6">
              <table>
                <tr>
                  <td><strong style="font-size:25px">{{@$details->name}}</strong> </td>
                </tr>
                <tr>
                  <td>{{@$details->present_address}}</td>
                </tr>
                <tr>
                  <td><strong>Mobile No/Email :</strong> {{@$details->username}}</td>
                </tr>
                <tr>
                  <td><strong>Mobile No :</strong> {{@$details->mobile}}</td>
                </tr>
              </table>
            </div>
            <div class="col-md-4 col-xs-6">
              <div class="profile-sidebar">
              <div class="profile-userpic text-center">
                 <img src="{{(!empty(@$details->image))?url('public/upload/employee_images/'.@$details->image):url('public/upload/no_image.png')}}" class="img-responsive" alt="">
              </div>
            </div>
            </div>
            <div class="col-md-12">
              <a href="{{route('profiles.view')}}" class="btn btn-primary btn-sm {{(@$page_title=='statement')?'btn_active':''}}" title="Statement"> Details Info</a>
              <a href="{{route('profiles.official.details')}}" class="btn btn-primary btn-sm {{(@$page_title=='official')?'btn_active':''}}" title="Official"> Official Info</a>
              <a href="{{route('profiles.personal.details')}}" class="btn btn-primary btn-sm {{(@$page_title=='personal')?'btn_active':''}}" title="Personal"> Personal Info </a>
              <a href="{{route('profiles.education.details')}}" class="btn btn-primary btn-sm {{(@$page_title=='education')?'btn_active':''}}" title="Education"> Educational Info</a>
              <a href="{{route('profiles.contact.details')}}" class="btn btn-primary btn-sm {{(@$page_title=='contact')?'btn_active':''}}" title="Contact"> Contact Info</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="{{route('profiles.details.official')}}" id="myForm">
              @csrf
              <input type="hidden" name="employee_id" id="employee_id" value="{{@$details->id}}">
              <div class="form-row">                   
                <div class="form-group col-md-4">
                  <label for="name">Full Name <span style="color:red;font-weight:bold;">*</span></label>
                  <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ @$details->name }}"> 
                  <font style="color: red"> 
                    {{($errors->has('name'))?($errors->first('name')):''}} 
                  </font>                 
                </div>
                <div class="form-group col-md-4">
                  <label for="mobile">Mobile No/Email <span style="color:red;font-weight:bold;">*</span></label>
                  <input type="text" name="username" class="form-control" placeholder="Mobile No/Email" value="{{ @$details->username }}"> 
                  <font style="color: red"> 
                    {{($errors->has('username'))?($errors->first('username')):''}} 
                  </font>                 
                </div>
                <div class="form-group col-md-4">
                  <label for="mobile">Mobile No <span style="color:red;font-weight:bold;">*</span></label>
                  <input type="text" name="mobile" class="form-control" placeholder="Mobile No" value="{{ @$details->mobile }}"> 
                </div>
                <div class="form-group col-md-4">
                  <label>Department</label>
                  <select name="department_id" class="form-control select2bs4">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                      <option value="{{ $department->id }}" {{(@$details->department_id == $department->id)?"selected":""}}>{{ $department->name }}</option>
                    @endforeach
                  </select> 
                  <font style="color: red"> 
                    {{($errors->has('department_id'))?($errors->first('department_id')):''}} 
                  </font>                 
                </div>
                <div class="form-group col-md-4">
                  <label for="designation_id">Designation <span style="color:red;font-weight:bold;">*</span></label>
                  <select name="designation_id" class="form-control select2bs4">
                    <option value="">Select Designation</option>
                    @foreach($designations as $designation)
                      <option value="{{ $designation->id }}" {{(@$details->designation_id == $designation->id)?"selected":""}}>{{ $designation->name }}</option>
                    @endforeach
                  </select> 
                  <font style="color: red"> 
                    {{($errors->has('designation_id'))?($errors->first('designation_id')):''}} 
                  </font>                 
                </div>
                 <div class="form-group col-md-4">
                    <label>Employee Type <span style="color:red;font-weight: bold;">*</span></label>
                    <select name="employee_type" class="form-control select2bs4">
                      <option value="">Select Type</option>
                      <option value="1" {{(@$details->employee_type == '1')?"selected":""}}>Teacher</option>
                      <option value="0" {{(@$details->employee_type == '0')?"selected":""}}>Staff</option>
                    </select>              
                  </div>
              </div>
              <button type="submit" class="btn btn-success btn-sm" id="storeButton">Update Information</button>
            </form>
        </div>
    </div>
  </div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#myForm').validate({
      rules:{
        name:{
          required:true
        },
        username:{
          required:true
        },
        mobile:{
          required:true
        },
        designation_id:{
          required:true
        },
        employee_type:{
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