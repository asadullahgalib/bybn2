@extends('frontend.layouts.master')
@section('content')
<!--================= Breadcrumbs Section Start Here =================-->
 <div class="react-breadcrumbs">
     <div class="breadcrumbs-wrap">
         <img class="desktop" src="{{asset('uploads/banner_images/'.@$contact->banner)}}" alt="Breadcrumbs">
         <img class="mobile" src="{{asset('uploads/banner_images/'.@$contact->banner)}}" alt="Breadcrumbs">
         <div class="breadcrumbs-inner">
             <div class="container">
                 <div class="breadcrumbs-text single_page_title">
                     <h1 class="breadcrumbs-title">Contact Us</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Contact Us</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>                
 </div>
 <!--================= Breadcrumbs Section End Here =================-->

 <div id="react-contact" class="react-contact-page pt---100">
  <div class="container">
      <div class="row pb---96">
          <div class="col-lg-4 pt---10">
              <ul class="address-sec" style="border: 1px dotted #a99c9c;margin-bottom: 10px;">
                  <h5 style="color: black;text-decoration: underline;text-align: center;font-weight: bold;">{{@$contact->contact_for_1}}:</h5>
                  <li>
                      <em class="icon"><img src="{{asset('public/frontend')}}/assets/images/contact/2.png" alt="image"></em>
                      <span class="text"><em>Address: </em> {{@$contact->address1}}</span>
                  </li>
                  <li>
                      <em class="icon"><img src="{{asset('public/frontend')}}/assets/images/contact/3.png" alt="image"></em>
                      <span class="text">
                        <em>Contact</em> <a href="#">Contact Number: {{@$contact->mobile1}}</a> 
                        <a href="#">Email: {{@$contact->email1}}</a>
                      </span>
                  </li>
              </ul>

              <ul class="address-sec" style="border: 1px dotted #a99c9c;margin-bottom: 10px;">
                  <h5 style="color: black;text-decoration: underline;text-align: center;font-weight: bold;">{{@$contact->contact_for_2}}:</h5>
                  <li>
                      <em class="icon"><img src="{{asset('public/frontend')}}/assets/images/contact/2.png" alt="image"></em>
                      <span class="text"><em>Address: </em> {{@$contact->address2}}</span>
                  </li>
                  <li>
                      <em class="icon"><img src="{{asset('public/frontend')}}/assets/images/contact/3.png" alt="image"></em>
                      <span class="text">
                        <em>Contact</em> <a href="#">Contact Number: {{@$contact->mobile2}}</a> 
                        <a href="#">Email: {{@$contact->email2}}</a>
                      </span>
                  </li>
              </ul>
          </div>
          <div class="col-lg-8">
              <!--================= Form Section Start Here =================-->
              <div class="react-blog-form"> 
                  <h2 class="contact-title" style="text-transform: uppercase;">Send us a message</h2>
                  <div id="blog-form" class="blog-form">
                      <div id="form-messages"></div>
                      <form method="POST" action="{{route('frontend.contact.store')}}" id="contact-form"> 
                           @csrf                                                   
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="back-input">
                                      <input id="name" type="text" name="name" placeholder="Your Name" required>
                                  </div>
                                  <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                              </div>

                              <div class="col-lg-6 pdl-5">
                                  <div class="back-input">
                                      <input id="email" type="email" name="email" placeholder="Your Email Address" required>
                                  </div>
                                  <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                              </div>
                              
                              <div class="col-lg-6">
                                  <div class="back-input">
                                      <input id="subject" type="text" name="subject" placeholder="Subject" required>       
                                  </div>
                                  <font color="red">{{($errors->has('subject'))?($errors->first('subject')):''}}</font>
                              </div>

                              <div class="col-lg-6 pdl-5">
                                  <div class="back-input">
                                      <input id="phone" type="text" name="mobile" placeholder="Phone" required>                   
                                  </div>
                                  <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                              </div>

                              <div class="col-lg-12">
                                  <div class="back-textarea">
                                      <textarea id="message" name="msg" placeholder="Message" required></textarea>
                                  </div>
                                  <font color="red">{{($errors->has('msg'))?($errors->first('msg')):''}}</font>
                              </div>
                              <div class="col-lg-12">
                                 <input name="privacy_policy" value="1" type="checkbox" style="height: 15px;width: 5%;"  required>
                                 <span style="padding-top: 1px;font-weight: bold;">I agree to the terms and privacy policy</span>
                                  <div class="back-input">
                                  </div>
                              </div>

                              <div class="col-lg-12">                                                
                                  <button type="submit" class="back-btn">Send Message <span class="fa fa-arrow-right"></span> </button>
                              </div>
                          </div>                                                    
                      </form>
                  </div>               
              </div>
              <!--================= Form Section End Here =================-->
          </div>
      </div>
      
      <div class="row pb---110">
          <div class="col-lg-12">
              <?php echo @$contact_map->description; ?>
          </div>
      </div> 

      <script>
         $(function() {
             $("#contact-form").validate({
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
             
  </div>
</div>
@endsection