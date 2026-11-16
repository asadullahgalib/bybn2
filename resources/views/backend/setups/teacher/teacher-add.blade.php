@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Teacher</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Teacher</li>
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
            Update Teacher
          @else
            Add Teacher
          @endif
          <a href="{{ route('teachers.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Teacher List</i></a>
        </h3>
      </div>

      <form role="form" action="{{(@$editData)?route('teachers.update',$editData->id):route('teachers.store')}}" method="POST" enctype="multipart/form-data" id="MyForm">
        @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-sm-3">
                <label for="religion_id">Class <span style="color:red;font-weight:bold;">*</span></label>
                <select name="teacher_class_id" class="form-control form-control-sm select2">
                  <option value="">Select Class</option>
                 @foreach($groups as $group)
                  <option value="{{$group->id}}" {{(@$editData->teacher_class_id == $group->id)?('selected'):''}}>{{$group->name}}</option>
                 @endforeach
                </select>          
              </div>               
              <div class="form-group col-md-3">
                <label for="name">Full Name <span style="color:red;font-weight:bold;">*</span></label>
                <input type="text" name="name" class="form-control form-control-sm" placeholder="Full Name" value="{{ @$editData->name }}"> 
                <font style="color: red"> 
                  {{($errors->has('name'))?($errors->first('name')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-3">
                <label for="mobile">Mobile No <span style="color:red;font-weight:bold;">*</span></label>
                <input type="text" name="mobile" class="form-control form-control-sm" placeholder="Enter Mobile Number" value="{{ @$editData->mobile }}"> 
                <font style="color: red"> 
                  {{($errors->has('mobile'))?($errors->first('mobile')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-3">
                <label for="mobile">Designation <span style="color:red;font-weight:bold;">*</span></label>
                <input type="text" name="designation" class="form-control form-control-sm"  value="{{ @$editData->designation }}"> 
              </div>
              <div class="form-group col-md-3">
                <label for="email">School Name</label>
                <input type="text" name="school_name" class="form-control form-control-sm" value="{{ @$editData->school_name }}"> 
                <font style="color: red"> 
                  {{($errors->has('school_name'))?($errors->first('school_name')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-4">
                <label for="salary">Address</label>
                <input type="text" name="address" class="form-control form-control-sm" value="{{ @$editData->address }}"> 
              </div>
              <div class="form-group col-md-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter Email Address" value="{{ @$editData->email }}"> 
                <font style="color: red"> 
                  {{($errors->has('email'))?($errors->first('email')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-2">
                <label for="dob">Birth Day</label>
                <input type="text" name="dob" class="form-control form-control-sm singledatepicker" placeholder="DD-MM-YYYY" value="{{ @$editData->dob }}" autocomplete="off"> 
              </div>
              <div class="form-group col-md-3">
                <label for="salary">Father's Name</label>
                <input type="text" name="fname" class="form-control form-control-sm" value="{{ @$editData->fname }}"> 
              </div>
              <div class="form-group col-md-3">
                <label for="salary">Mothers's Name</label>
                <input type="text" name="mname" class="form-control form-control-sm" value="{{ @$editData->mname }}"> 
              </div>
              <div class="form-group col-sm-3">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control form-control-sm">
                  <option value="">Select Gender</option>
                  <option value="Male" @if(@$editData->gender=="Male") selected @endif>Male</option>
                  <option value="Female" @if(@$editData->gender=="Female") selected @endif>Female</option>
                </select>            
              </div>
              <div class="form-group col-sm-3">
                <label for="religion_id">Religion</label>
                <select name="religion_id" class="form-control form-control-sm">
                  <option value="">Select Religion</option>
                 @foreach($religions as $religion)
                  <option value="{{$religion->id}}" {{(@$editData->religion_id == $religion->id)?('selected'):''}}>{{$religion->name}}</option>
                 @endforeach
                </select>          
              </div>
              <div class="form-group col-sm-3">
                <label class="control-label"><strong>Nationality</strong></label>
                <input type="text" name="nationality" id="nationality" class="form-control form-control-sm" value="{{@$editData->nationality}}" placeholder="Nationality" autocomplete="off">
              </div>
              <div class="form-group col-sm-3">
                <label class="control-label"><strong>NID No</strong></label>
                <input type="text" name="nid_no" id="nid_no" class="form-control form-control-sm" value="{{@$editData->nid_no}}" placeholder="NID No." autocomplete="off">
              </div>
              <div class="form-group col-sm-3">
                <label class="control-label"><strong>Blood Group</strong></label>
                <select class="form-control form-control-sm" name="blood_group" id="blood_group">
                  <option  value="">Select Blood Group</option>
                  <option {{@$editData->blood_group=="A+" ? 'selected':''}} value="A+">A+</option>
                  <option {{@$editData->blood_group=="O+" ? 'selected':''}} value="O+">O+</option>
                  <option {{@$editData->blood_group=="B+" ? 'selected':''}} value="B+">B+</option>
                  <option {{@$editData->blood_group=="AB+" ? 'selected':''}} value="AB+">AB+</option>
                  <option {{@$editData->blood_group=="A-" ? 'selected':''}} value="A-">A-</option>
                  <option {{@$editData->blood_group=="O-" ? 'selected':''}} value="O-">O-</option>
                  <option {{@$editData->blood_group=="B-" ? 'selected':''}} value="B-">B-</option>
                  <option {{@$editData->blood_group=="AB-" ? 'selected':''}} value="AB-">AB-</option>
                </select>
              </div>
              <div class="form-group col-sm-3">
                <label class="control-label"><strong>Marrital Status</strong></label>
                <select class="form-control form-control-sm" name="marital_status" id="marital_status">
                  <option value="">Select Marital Status</option>
                  <option {{@$editData->marital_status=="single" ? 'selected':''}} value="single">Single</option>
                  <option {{@$editData->marital_status=="married" ? 'selected':''}} value="married">Married</option>
                  <option {{@$editData->marital_status=="widowed" ? 'selected':''}} value="widowed">Widowed</option>
                  <option {{@$editData->marital_status=="divorced" ? 'selected':''}} value="divorced">Divorced</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary btn-sm">@if(isset($editData)) Update @else Submit @endif</button>
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
        teacher_class_id:{
          required:true
        },
        name:{
          required:true
        },
        mobile:{
          required:true
        },
        designation:{
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