@extends('frontend.layouts.master')
@section('content')
<!--================= Banner Image Start Here =================-->
 <div class="react-breadcrumbs">
     <div class="breadcrumbs-wrap">
         <img class="desktop" src="{{asset('uploads/banner_images/'.@$contact->banner)}}" alt="BYVN Banner Image">
         <img class="mobile" src="{{asset('uploads/banner_images/'.@$contact->banner)}}" alt="BYVN Banner Image">
         <div class="breadcrumbs-inner">
             <div class="container">
                 <div class="breadcrumbs-text">
                     <h1 class="breadcrumbs-title">Volunteer Signup</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Volunteer Signup</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>                
 </div>
 <!--================= Banner Image End Here =================-->

 <style>
     label span{
        color:red;
        font-weight:bold;
     }
     .custom_div{
        margin-bottom: 15px;
     }
 </style>

 <!--================= Wrapper Start Here =================-->
 <div class="react-wrapper">
    <div class="react-wrapper-inner">  
        <div class="react-login-page react-signup-page pt---120 pb---120" style="padding-bottom: 90px;">
            <div class="container">
                <div class="row">
                    <div class="card" style="background: #fff;
                            padding: 50px;
                            margin: 0 auto;
                            border-radius: 10px;
                            box-shadow: 0 40px 60px rgba(15, 18, 22, .08);">
                        <div class="col-lg-12">
                            <form method="POST" action="{{route('frontend.volunteer-signup.store')}}" enctype="multipart/form-data" id="MyForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 custom_div">
                                        <label>Name <span >*</span> </label>
                                        <input type="text" name="name" class="form-control" placeholder="Write your Full Name">
                                        <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Mobile No <span >*</span> </label>
                                        <input type="text" name="mobile" class="form-control">
                                        <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Email <span >*</span> </label>
                                        <input type="text" name="email" class="form-control">
                                        <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Gender <span >*</span> </label>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <font color="red">{{($errors->has('gender'))?($errors->first('gender')):''}}</font>
                                    </div>
                                    <div class="col-md-8 custom_div">
                                        <label>Address <span >*</span> </label>
                                        <input type="text" name="address" class="form-control">
                                        <font color="red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Date of Birth <span >*</span> </label>
                                        <input type="date" name="dob" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Occupation <span >*</span> </label>
                                        <input type="text" name="occupation" class="form-control" placeholder="Write your Occupation">
                                        <font color="red">{{($errors->has('occupation'))?($errors->first('occupation')):''}}</font>
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Highest Level of Education <span >*</span> </label>
                                        <select name="education" class="form-control">
                                            <option value="">Select Level</option>
                                            <option value="Primary School (Grade 1-5)">Primary School (Grade 1-5)</option>
                                            <option value="High School (Grade 6-10)">High School (Grade 6-10)</option>
                                            <option value="Secondary School / O Levels /Dakhil Equivalent">Secondary School / O Levels /Dakhil Equivalent</option>
                                            <option value="Higher Secondary / A Level /Alim /Equivalent">Higher Secondary / A Level /Alim /Equivalent</option>
                                            <option value="Diploma /Equivalent">Diploma /Equivalent</option>
                                            <option value="Bachelor /Hons /Equivalent">Bachelor /Hons /Equivalent</option>
                                            <option value="Masters / Post Graduation /Equivalent">Masters / Post Graduation /Equivalent</option>
                                        </select>
                                        <font color="red">{{($errors->has('education'))?($errors->first('education')):''}}</font>
                                    </div>
                                    <div class="col-md-8 custom_div">
                                        <label>Last Educational Institute's Name <span >*</span> </label>
                                        <input type="text" name="institute" class="form-control">
                                        <font color="red">{{($errors->has('institute'))?($errors->first('institute')):''}}</font>
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Blood Group <span >*</span> </label>
                                        <select name="blood_group" class="form-control">
                                            <option value="">Select Group</option>
                                            <option value="A Positive (A+)">A Positive (A+)</option>
                                            <option value="A Negative (A-)">A Negative (A-)</option>
                                            <option value="B Positive (B+)">B Positive (B+)</option>
                                            <option value="B Negative (B-)">B Negative (B-)</option>
                                            <option value="AB Positive (AB+)">AB Positive (AB+)</option>
                                            <option value="AB Negative (AB-)">AB Negative (AB-)</option>
                                            <option value="O Positive (O+)">O Positive (O+)</option>
                                            <option value="O Negative (O-)">O Negative (O-)</option>
                                        </select>
                                        <font color="red">{{($errors->has('blood_group'))?($errors->first('blood_group')):''}}</font>
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Image (Size: 300px X 300px) <span >*</span> </label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        <font color="red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                    </div>
                                    <div class="col-md-2 custom_div">
                                        <img id="showImage" src="{{url('uploads/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
                                    </div>
                                    <div class="col-md-3" style="padding-top:30px;">
                                        <button type="submit" id="button" name="submit" class="btn btn-success">Register</button>
                                    </div>
                                </div>
                            </form>                        
                        </div>                          
                    </div>
                </div>
            </div>
        </div>            
    </div>
 </div>
 <!--================= Wrapper End Here =================-->

 <script type="text/javascript">
    $(document).ready(function () {
      $('#MyForm').validate({
        ignore : [],
        debug : false,
        rules: {
          name: {
            required: true,
          },
          mobile: {
            required: true,
          },
          email: {
            required: true,
          },
          gender: {
            required: true,
          },
          address: {
            required: true,
          },
          dob: {
            required: true,
          },
          occupation: {
            required: true,
          },
          education: {
            required: true,
          },
          institute: {
            required: true,
          },
          blood_group: {
            required: true,
          },
          image: {
            required: true,
          },
        },
        messages: {
          
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.custom_div').append(error);
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