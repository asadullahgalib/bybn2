@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Applicant Student</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Applicant</li>
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
          Verify Applicant Student
          @else
          Add Applicant Student
          @endif
          <a href="{{ route('web-site.student.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> Applicant Student List</i></a>
        </h3>
      </div>

      <form role="form" action="{{route('web-site.student.verify.store',$editData->id)}}" method="POST" enctype="multipart/form-data" id="MyForm">
        @csrf
        <input type="hidden" name="student_id" value="{{ @$editData->student_id }}">
        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md-12">
              <p style="font-weight:bold;text-decoration: underline;">ছাত্র/ছাত্রীর তথ্যঃ</p>
              <hr style="margin-bottom:0px">
            </div>                
            <div class="form-group col-md-3">
              <label for="name">নাম বাংলায় <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" name="name_bn" class="form-control form-control-sm"  value="{{ @$editData->student->name_bn }}"> 
            </div>
            <div class="form-group col-md-3">
              <label for="name">নাম ইংরেজিতে <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" name="name_en" class="form-control form-control-sm"  value="{{ @$editData->student->name_en }}"> 
            </div>
            <div class="form-group col-md-3">
              <label for="dob">Date of Birth </label>
              <input type="text" name="dob" class="form-control form-control-sm singledatepicker" placeholder="DD-MM-YYYY" autocomplete="off" value="{{(@$editData->student->dob !=null)?(date('d-m-Y',strtotime(@$editData->student->dob))):old('date')}}" required="" readonly style="background: white;"> 
            </div>
            <div class="form-group col-md-3">
              <label for="dob">ভর্তির তারিখ <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" name="admission_date" class="form-control form-control-sm singledatepicker" autocomplete="off" placeholder="DD-MM-YYYY" value="{{ @$editData->admission_date }}" required="" readonly style="background: white;"> 
            </div>
            <div class="form-group col-md-2">
              <label for="mname">রোল </label>
              <input type="number" name="roll" class="form-control form-control-sm"  value="{{ @$editData->roll }}">  
            </div>
            <div class="form-group col-md-2">
              <label for="year_id">সেশন/বছর <span style="color:red;font-weight: bold;">*</span></label>
              <select name="year_id" class="form-control form-control-sm year_id">
                <option value="">Select Year</option>
                @foreach($years as $year)
                <option value="{{ $year->id }}" {{(@$editData->year_id == $year->id)?"selected":""}}>{{ $year->name }}</option>
                @endforeach
              </select>             
            </div>
            <div class="form-group col-md-2">
              <label for="class_id">শ্রেণী <span style="color:red;font-weight: bold;">*</span></label>
              <select name="class_id" class="form-control form-control-sm class_id">
                <option value="">Select Class</option>
                @foreach($classes as $class)
                <option value="{{ $class->id }}" {{(@$editData->class_id == $class->id)?"selected":""}}>{{ $class->name }}</option>
                @endforeach
              </select>             
            </div>
            <div class="form-group col-sm-4">
              <label class="control-label">রক্তের গ্রুপ</label>
              <select class="form-control form-control-sm" name="blood_group" id="blood_group">
                <option  value="">Select Blood Group</option>
                <option {{@$editData->student->blood_group=="A+" ? 'selected':''}} value="A+">A+</option>
                <option {{@$editData->student->blood_group=="O+" ? 'selected':''}} value="O+">O+</option>
                <option {{@$editData->student->blood_group=="B+" ? 'selected':''}} value="B+">B+</option>
                <option {{@$editData->student->blood_group=="AB+" ? 'selected':''}} value="AB+">AB+</option>
                <option {{@$editData->student->blood_group=="A-" ? 'selected':''}} value="A-">A-</option>
                <option {{@$editData->student->blood_group=="O-" ? 'selected':''}} value="O-">O-</option>
                <option {{@$editData->student->blood_group=="B-" ? 'selected':''}} value="B-">B-</option>
                <option {{@$editData->student->blood_group=="AB-" ? 'selected':''}} value="AB-">AB-</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="gender">Gender</label>
              <select name="gender" class="form-control form-control-sm">
                <option value="">Select Gender</option>
                <option value="Male" @if(@$editData->student->gender=="Male") selected @endif>Male</option>
                <option value="Female" @if(@$editData->student->gender=="Female") selected @endif>Female</option>
              </select>             
            </div>
            <div class="form-group col-md-2">
              <label for="religion_id">Religion</label>
              <select name="religion_id" class="form-control form-control-sm">
                <option value="">Select Religion</option>
                @foreach($religions as $religion)
                <option value="{{$religion->id}}" {{(@$editData['student']['religion_id'] == $religion->id)?('selected'):''}}>{{$religion->name}}</option>
                @endforeach
              </select>           
            </div>
            <div class="form-group col-md-4">
              <label for="mobile">জন্ম নিবন্ধন নং </label>
              <input type="text" name="birth_reg" class="form-control form-control-sm" value="{{ @$editData->student->birth_reg }}">
            </div>
            <div class="form-group col-md-3">
              <label for="image">Student Image <span style="color:red">(300px X 385px)</span></label>
              <input type="file" name="image" class="form-control form-control-sm" id="image">              
            </div>
            <div class="form-group col-md-1">
              <img id="showImage" src="{{(!empty(@$editData['student']['image']))?url('public/upload/student_images/'.@$editData['student']['image']):url('public/upload/no_image.png')}}" style="width: 80px; height: 80px; border: 1px solid #000;">            
            </div>

            <div class="form-group col-md-12">
              <p style="font-weight:bold;text-decoration: underline;">পিতার তথ্যঃ</p>
              <hr style="margin-bottom:0px">
            </div>
            <div class="form-group col-md-3">
              <label for="fname">নাম বাংলায়  </label>
              <input type="text" name="fname_bn" class="form-control form-control-sm" value="{{ @$editData->student->fname_bn }}"> 
              <font style="color: red"> 
                {{($errors->has('fname_bn'))?($errors->first('fname_bn')):''}} 
              </font>                 
            </div>
            <div class="form-group col-md-3">
              <label for="fname">নাম ইংরেজিতে  </label>
              <input type="text" name="fname_en" class="form-control form-control-sm" value="{{ @$editData->student->fname_en }}"> 
            </div>
            <div class="form-group col-md-2">
              <label for="fname">পেশা বাংলায় </label>
              <input type="text" name="father_occupation_bn" class="form-control form-control-sm" value="{{ @$editData->student->father_occupation_bn }}"> 
            </div>
            <div class="form-group col-md-2">
              <label for="fname">পেশা ইংরেজিতে </label>
              <input type="text" name="father_occupation_en" class="form-control form-control-sm" value="{{ @$editData->student->father_occupation_en }}"> 
            </div>
            
            <div class="form-group col-md-2">
              <label for="mobile">মোবাইল নম্বর <span style="color:red;font-weight: bold;">*</span> 
              </label>
              <input type="text" name="father_mobile" class="form-control form-control-sm" value="{{ @$editData->student->father_mobile }}" required>
            </div>

            <div class="form-group col-md-12">
              <p style="font-weight:bold;text-decoration: underline;">মাতার তথ্যঃ</p>
              <hr style="margin-bottom:0px">
            </div>
            <div class="form-group col-md-3">
              <label for="mname">নাম বাংলায় </label>
              <input type="text" name="mname_bn" class="form-control form-control-sm" value="{{ @$editData->student->mname_bn }}"> 
            </div>
            <div class="form-group col-md-3">
              <label for="mname">নাম ইংরেজিতে </label>
              <input type="text" name="mname_en" class="form-control form-control-sm" value="{{ @$editData->student->mname_en }}"> 
            </div>
            <div class="form-group col-md-2">
              <label for="fname">পেশা বাংলায় </label>
              <input type="text" name="mother_occupation_bn" class="form-control form-control-sm" value="{{ @$editData->student->mother_occupation_bn }}"> 
            </div>
            <div class="form-group col-md-2">
              <label for="fname">পেশা ইংরেজিতে </label>
              <input type="text" name="mother_occupation_en" class="form-control form-control-sm" value="{{ @$editData->student->mother_occupation_en }}"> 
            </div>
            <div class="form-group col-md-2">
              <label for="mobile">মোবাইল নম্বর </label>
              <input type="text" name="mother_mobile" class="form-control form-control-sm" value="{{ @$editData->student->mother_mobile }}">
            </div>
            <div class="form-group col-md-12">
              <p style="font-weight:bold;text-decoration: underline;">বর্তমান ঠিকানাঃ</p>
              <hr style="margin-bottom:0px">
            </div>
            <div class="form-group col-md-6">
              <label for="mobile">ঠিকানা বাংলায় </label>
              <input type="text" name="present_address_bn" class="form-control form-control-sm" value="{{ @$editData->student->present_address_bn }}">
            </div>
            <div class="form-group col-md-6">
              <label for="mobile">ঠিকানা ইংরেজিতে </label>
              <input type="text" name="present_address_en" class="form-control form-control-sm" value="{{ @$editData->student->present_address_en }}">
            </div>

            <div class="form-group col-md-12">
              <p style="font-weight:bold;text-decoration: underline;">স্থায়ী ঠিকানাঃ</p>
              <hr style="margin-bottom:0px">
            </div>
            <div class="form-group col-md-3">
              <label for="mobile">গ্রাম বাংলায়  
              </label>
              <input type="text" name="permanent_village_bn" class="form-control form-control-sm" value="{{ @$editData->student->permanent_village_bn }}">
            </div>
            <div class="form-group col-md-3">
              <label for="mobile">গ্রাম ইংরেজিতে  
              </label>
              <input type="text" name="permanent_village_en" class="form-control form-control-sm" value="{{ @$editData->student->permanent_village_en }}">
            </div>
            <div class="form-group col-md-3">
              <label for="mobile">পোঃ বাংলায়  
              </label>
              <input type="text" name="permanent_post_bn" class="form-control form-control-sm" value="{{ @$editData->student->permanent_post_bn }}">
            </div>
            <div class="form-group col-md-3">
              <label for="mobile">পোঃ ইংরেজিতে  
              </label>
              <input type="text" name="permanent_post_en" class="form-control form-control-sm" value="{{ @$editData->student->permanent_post_en }}">
            </div>
            <div class="form-group col-md-3">
              <label for="mobile">থানা বাংলায়  
              </label>
              <input type="text" name="permanent_upazila_bn" class="form-control form-control-sm" value="{{ @$editData->student->permanent_upazila_bn }}">
            </div>
            <div class="form-group col-md-3">
              <label for="mobile">থানা ইংরেজিতে  
              </label>
              <input type="text" name="permanent_upazila_en" class="form-control form-control-sm" value="{{ @$editData->student->permanent_upazila_en }}">
            </div>
            <div class="form-group col-md-3">
              <label for="mobile">জেলা বাংলায়  
              </label>
              <input type="text" name="permanent_district_bn" class="form-control form-control-sm" value="{{ @$editData->student->permanent_district_bn }}">
            </div>
            <div class="form-group col-md-3">
              <label for="mobile">জেলা ইংরেজিতে  
              </label>
              <input type="text" name="permanent_district_en" class="form-control form-control-sm" value="{{ @$editData->student->permanent_district_en }}">
            </div>

            <div class="form-group col-md-12">
              <p style="font-weight:bold;text-decoration: underline;">পূর্বের স্কুলের নামঃ</p>
              <hr style="margin-bottom:0px">
            </div>

            <div class="form-group col-md-6">
              <label for="address"> নাম বাংলায় </label>
              <input type="text" name="previous_school_bn" class="form-control form-control-sm" value="{{ @$editData->student->previous_school_bn }}">
            </div>
            <div class="form-group col-md-6">
              <label for="address"> নাম ইংরেজিতে </label>
              <input type="text" name="previous_school_en" class="form-control form-control-sm" value="{{ @$editData->student->previous_school_en }}">
            </div>

            <div class="form-group col-md-12">
              <p style="font-weight:bold;text-decoration: underline;">পিতার অবর্তমানে অভিভাবক</p>
              <hr style="margin-bottom:0px">
            </div>
            <div class="form-group col-md-3">
              <label for="mname">নাম বাংলায় </label>
              <input type="text" name="nomini_father_name_bn" class="form-control form-control-sm" value="{{ @$editData->student->nomini_father_name_bn }}"> 
            </div>
            <div class="form-group col-md-3">
              <label for="mname">নাম ইংরেজিতে </label>
              <input type="text" name="nomini_father_name_en" class="form-control form-control-sm" value="{{ @$editData->student->nomini_father_name_en }}"> 
            </div>
            <div class="form-group col-md-6">
              <label for="mname">ঠিকানা বাংলায় </label>
              <input type="text" name="nomini_address_bn" class="form-control form-control-sm" value="{{ @$editData->student->nomini_address_bn }}"> 
            </div>
            <div class="form-group col-md-6">
              <label for="mname">ঠিকানা ইংরেজিতে </label>
              <input type="text" name="nomini_address_en" class="form-control form-control-sm" value="{{ @$editData->student->nomini_address_en }}"> 
            </div>
            <div class="form-group col-md-3">
              <label for="fname">পেশা বাংলায় </label>
              <input type="text" name="nomini_occupation_bn" class="form-control form-control-sm" value="{{ @$editData->student->nomini_occupation_bn }}"> 
            </div>
            <div class="form-group col-md-3">
              <label for="fname">পেশা ইংরেজিতে </label>
              <input type="text" name="nomini_occupation_en" class="form-control form-control-sm" value="{{ @$editData->student->nomini_occupation_en }}"> 
            </div>
            <div class="form-group col-md-3">
              <label for="fname">পিতার বাৎসরিক আয় </label>
              <input type="text" name="father_yearly_income" class="form-control form-control-sm" value="{{ @$editData->student->father_yearly_income }}"> 
            </div>
            <div class="form-group col-md-3" style="padding-top:30px">
              <button type="submit" class="btn btn-primary btn-sm">@if(isset($editData)) Verify Student  @else Submit Student @endif</button>
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
        name_bn:{
          required:true
        },
        name_en:{
          required:true
        },
        // dob:{
        //   required:true
        // },
        admission_date:{
          required:true
        },
        year_id:{
          required:true
        },
        class_id:{
          required:true
        },
        // fname_bn:{
        //   required:true
        // },
        // fname_en:{
        //   required:true
        // },
        // father_occupation_bn:{
        //   required:true
        // },
        // father_occupation_en:{
        //   required:true
        // },
        // father_mobile:{
        //   required:true
        // },
        // mname_bn:{
        //   required:true
        // },
        // mname_en:{
        //   required:true
        // },
        // present_address_bn:{
        //   required:true
        // },
        // present_address_en:{
        //   required:true
        // },
        // permanent_village_bn:{
        //   required:true
        // },
        // permanent_village_en:{
        //   required:true
        // },
        // permanent_post_bn:{
        //   required:true
        // },
        // permanent_post_en:{
        //   required:true
        // },
        // permanent_upazila_bn:{
        //   required:true
        // },
        // permanent_upazila_en:{
        //   required:true
        // },
        // permanent_district_bn:{
        //   required:true
        // },
        // permanent_district_en:{
        //   required:true
        // },
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