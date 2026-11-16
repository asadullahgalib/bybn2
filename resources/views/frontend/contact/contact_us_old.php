@extends('frontend.layouts.master')
@section('content')
<div class="page-banner bg-1 ptb-100">
 <div class="container">
    <div class="row align-items-center">
       <div class="col-lg-6 col-md-6">
          <div class="page-banner-content">
             <h1>Contact Us</h1>
             <ul>
                <li><a href="{{url('')}}">Home</a></li>
                <li>Contact Us</li>
             </ul>
          </div>
       </div>
       <div class="col-lg-6 col-md-6">
          <div class="page-banner-img">
             <img src="{{asset('uploads/banner_images/'.@$contact->banner)}}" alt="Nusair Group Image">
          </div>
       </div>
    </div>
 </div>
</div>

<div class="pricing-area pt-100 pb-70">
 <div class="container">
    <div class="section-title">
       <h2>Our Office Locations</h2>
    </div>
    <div class="row justify-content-center">
       @foreach($contact_details as $details)
       <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
          <div class="single-pricing-card">
             <div class="top-content" style="width: 100%;">
                <h3 style="font-size: 15px;text-align: center;color: white;padding: 13px;">{{$details->branch}}</h3>
             </div>
             <div class="list">
                <ul>
                   <li>
                      <i class="ri-map-pin-line"></i>
                      <p>{{$details->address}}</p>
                   </li>
                   <li>
                      <i class="ri-kakao-talk-line"></i>
                      <p>Tel: {{$details->mobile}}</p>
                   </li>
                   <li>
                      <i class="ri-mail-send-line"></i>
                      <p>Email: {{$details->email}}</p>
                   </li>
                   <li>
                      <i class="ri-calendar-check-line"></i>
                      <p>Office Days: {{$details->office_day}}</p>
                   </li>
                   <li>
                      <i class="ri-calendar-schedule-line"></i>
                      <p>Office Time: {{$details->office_time}}</p>
                   </li>
                   <li>
                      <i class="ri-whatsapp-line"></i>
                      <p> WhatsApp: {{$details->whatsapp}}</p>
                   </li>
                </ul>
             </div>
             <a href="#" class="custom-default-btn btn" data-bs-toggle="modal" data-bs-target="#contactInquiry" style="margin-bottom: 10px;background:darkblue;color: white;font-weight: bold;text-transform: uppercase;">Enquiry Now</a>
          </div>
       </div>
       @endforeach
    </div>
 </div>
</div>

<!-- The Modal -->
<div class="modal" id="contactInquiry">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="text-align:center;">
        <h4 class="modal-title">Inquiry Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST" action="{{route('frontend.contact.store')}}" id="inquiryForm">
            @csrf
             <div class="row">
                <div class="col-lg-6 col-sm-6">
                   <div class="form-group">
                      <label style="font-weight: bold;font-size: 17px;color: #000;">Your name <span style="color: red;">*</span> </label>
                      <input type="text" name="name" id="name" class="form-control" required>
                      <div class="help-block with-errors"></div>
                   </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                   <div class="form-group">
                      <label style="font-weight: bold;font-size: 17px;color: #000;">Your email <span style="color: red;">*</span> </label>
                      <input type="email" name="email" id="email" class="form-control" required>
                      <div class="help-block with-errors"></div>
                   </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                   <div class="form-group">
                      <label style="font-weight: bold;font-size: 17px;color: #000;">Your phone <span style="color: red;">*</span> </label>
                      <input type="text" name="mobile" id="phone_number" class="form-control" required>
                      <div class="help-block with-errors"></div>
                   </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                   <div class="form-group">
                      <label style="font-weight: bold;font-size: 17px;color: #000;">Subject <span style="color: red;">*</span> </label>
                      <input type="text" name="subject" id="msg_subject" class="form-control" required>
                      <div class="help-block with-errors"></div>
                   </div>
                </div>
                <div class="col-12">
                   <div class="form-group">
                      <label style="font-weight: bold;font-size: 17px;color: #000;">Your message <span style="color: red;">*</span> </label>
                      <textarea name="msg" class="form-control" id="message" cols="30" rows="8" required></textarea>
                      <div class="help-block with-errors"></div>
                   </div>
                </div>
                <div class="form-group">
                   <div class="form-check" style="padding: 20px;font-size: 18px;color: #000;">
                      <input name="privacy_policy" value="I agree to the terms and privacy policy." class="form-check-input" type="checkbox" id="gridCheck" required>
                      <label class="form-check-label" for="gridCheck">
                      I agree to the <a href="#">terms</a> and <a href="#">privacy policy</a>
                       <span style="color: red;">*</span> </label>
                      <div class="help-block with-errors gridCheck-error"></div>
                   </div>
                </div>
                <div class="col-lg-12 col-md-12">
                   <button type="submit" class="default-btn" style="font-weight: bold;color: #000;font-size: 17px;">
                   <span>ENQUIRY NOW</span>
                   </button>
                   <div id="msgSubmit" class="h3 text-center hidden"></div>
                   <div class="clearfix"></div>
                </div>
             </div>
         </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
   $(function() {
       $("#inquiryForm").validate({
           errorClass:'text-danger',
           validClass:'text-success',
           rules: {
               name: {
                   required: true,
                   maxlength : 100,
               },
               mobile: {
                   required: true,
                   maxlength : 100,
               },
               email: {
                   required: true,
                   maxlength : 100,
               },
               subject: {
                   required: true,
                   maxlength : 180,
               },
               msg: {
                   required: true,
                   maxlength : 500,
               },
               privacy_policy: {
                   required: true,
               },
           },
           messages: {
           }
       });
   });
</script>

<div class="contact-area ptb-100" style="background:#F3FBFB">
 <div class="container">
    <div class="row align-items-center">
       <div class="col-lg-6">
          <div class="contact-img">
             <img src="{{asset('public/frontend')}}/assets/images/contact-img.png" alt="Image">
          </div>
       </div>
       <div class="col-lg-6">
          <div class="contact-form">
             <form method="POST" action="{{route('frontend.contact.store')}}" id="contactForm">
               @csrf
                <div class="row">
                   <div class="col-lg-6 col-sm-6">
                      <div class="form-group">
                         <label>Your name</label>
                         <input type="text" name="name" id="name" class="form-control" required>
                         <div class="help-block with-errors"><font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font></div>
                      </div>
                   </div>
                   <div class="col-lg-6 col-sm-6">
                      <div class="form-group">
                         <label>Your email</label>
                         <input type="email" name="email" id="email" class="form-control" required>
                         <div class="help-block with-errors"><font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font></div>
                      </div>
                   </div>
                   <div class="col-lg-6 col-sm-6">
                      <div class="form-group">
                         <label>Your phone</label>
                         <input type="text" name="mobile" id="phone_number" class="form-control" required>
                         <div class="help-block with-errors"><font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font></div>
                      </div>
                   </div>
                   <div class="col-lg-6 col-sm-6">
                      <div class="form-group">
                         <label>Subject</label>
                         <input type="text" name="subject" id="msg_subject" class="form-control" required>
                         <div class="help-block with-errors"><font color="red">{{($errors->has('subject'))?($errors->first('subject')):''}}</font></div>
                      </div>
                   </div>
                   <div class="col-12">
                      <div class="form-group">
                         <label>Your message</label>
                         <textarea name="msg" class="form-control" id="message" cols="30" rows="8" required></textarea>
                         <div class="help-block with-errors"><font color="red">{{($errors->has('msg'))?($errors->first('msg')):''}}</font></div>
                      </div>
                   </div>
                   <div class="form-group">
                      <div class="form-check">
                         <input name="privacy_policy" value="I agree to the terms and privacy policy." class="form-check-input" type="checkbox" id="gridCheck" required>
                         <label class="form-check-label" for="gridCheck">
                         I agree to the <a href="#">terms</a> and <a href="#">privacy policy</a>
                         </label>
                         <div class="help-block with-errors gridCheck-error"></div>
                      </div>
                   </div>
                   <div class="col-lg-12 col-md-12">
                      <button type="submit" class="default-btn">
                      <span>Send message</span>
                      </button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div>
                      <div class="clearfix"></div>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
</div>

<script>
   $(function() {
       $("#contactForm").validate({
           errorClass:'text-danger',
           validClass:'text-success',
           rules: {
               name: {
                   required: true,
                   maxlength : 100,
               },
               mobile: {
                   required: true,
                   maxlength : 100,
               },
               email: {
                   required: true,
                   maxlength : 100,
               },
               subject: {
                   required: true,
                   maxlength : 180,
               },
               msg: {
                   required: true,
                   maxlength : 500,
               },
               privacy_policy: {
                   required: true,
               },
           },
           messages: {
               name_en : {
                   required:'Name English field is require',
                   regex : 'Write only english',
               },
               username : {
                   required:'Mobile no is required',
                   remote:'This Mobile No is already exists!',
               },
           }
       });
   });
</script>

<div class="map-area">
 <div class="container" style="border: 2px solid #F3FBFB" >
   <?php echo @$contact_map->description; ?>
 </div>
</div>
<div class="doctors-area pt-100 pb-70 style" style="background:#F3FBFB">
 <div class="container">
    <div class="section-title">
       <h2>Meet Our Expert Team</h2>
    </div>
    <div class="doctor-slider2 owl-carousel owl-theme">
       @foreach($teachers as $teacher)
       <div class="single-doctor-card style3" style="border:1px solid;">
          <div class="doctor-img">
             <img src="{{(!empty($teacher->image))?url('uploads/employee_images/'.$teacher->image):url('uploads/no_image.png')}}" alt="Image">
             <!-- <div class="social-content">
                <ul>
                   <li>
                      <a href="https://www.facebook.com/" target="_blank"><i class="ri-phone-line"></i></a>
                   </li>
                   <li>
                      <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                   </li>
                   <li>
                      <a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
                   </li>
                   <li>
                      <a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a>
                   </li>
                </ul>
             </div> -->
          </div>
          <div class="doctor-card-content">
             <h3>{{$teacher->name}}</h3>
             <p style="font-weight: bold;margin-bottom: 0px;">{{$teacher->designation}}</p>
             <p style="font-weight: bold;margin-bottom: 0px;"><i class="fa fa-envelope"></i> {{$teacher->email}}</p>
             <p style="font-weight: bold;margin-bottom: 0px;"><i class="fa fa-phone"></i> {{$teacher->mobile}}</p>
          </div>
       </div>
       @endforeach
    </div>
 </div>
</div>
@endsection