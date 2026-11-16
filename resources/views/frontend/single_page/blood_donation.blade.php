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
                     <h1 class="breadcrumbs-title">Blood Donate</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Blood Donate</li>
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
                            <form method="POST" action="{{route('frontend.blood-donate.store')}}" enctype="multipart/form-data" id="MyForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 custom_div">
                                        <label>Name <span >*</span> </label>
                                        <input type="text" name="name" class="form-control" placeholder="Write your Full Name">
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Mobile No <span >*</span> </label>
                                        <input type="text" name="mobile" class="form-control">
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Email </label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Gender <span >*</span> </label>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8 custom_div">
                                        <label>Address <span >*</span> </label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                    <div class="col-md-4 custom_div">
                                        <label>Date of Birth <span >*</span> </label>
                                        <input type="date" name="dob" class="form-control" autocomplete="off">
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
                                    <div class="col-md-6 custom_div">
                                        <button type="submit" id="button" name="submit" class="btn btn-success">Submit</button>
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
          gender: {
            required: true,
          },
          address: {
            required: true,
          },
          dob: {
            required: true,
          },
          blood_group: {
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