<style type="text/css">
    *{box-sizing:border-box;}
    *{margin:0;padding:0;text-decoration:none;}
    .btn-color{background: linear-gradient(to bottom, #138b22, #086030);}
    button,h2{font-family:"Noto Sans Bengali", sans-serif;}
    .b-i{position:relative;}
    .b-i{background:linear-gradient(#020202c4, #ffffff7a) center/cover, url('{{ asset("frontend/footer_banner.jpg")}}') center/cover;top:-50px;
        z-index: 2;
    }
    @media (max-width:457px){
    .b-i .btn{margin:0 66px!important;}
    .b-i h2{padding:0!important;}
    }
</style>

<!--================= Footer Section Start Here =================-->
<footer id="react-footer" class="react-footer home-main" style="background-color: #0F4F2C;">
    <div class="container b-i rounded shadow p-5">
       <div class="row">
        <div class="col-12 d-md-flex ">
            <h2 class="overflow-y-hidden py-2 fw-bold text-white p-3 mobile_community">Our Community</h2>
            <a href="{{@$contact->facebook}}" target="_blank"><button type="button" class="btn text-white btn-color text-white rounded  fw-bold  text-center my-3">Join</button></a>
        </div>
       </div>
    </div>
    <div class="footer-top" style="padding: 10px 0 15px;">
       <div class="container">
           <div class="row">
               <div class="col-lg-6 md-mb-30">
                   <div class="footer-widget footer-widget-1">
                       <h3 class="footer-title"> Contact Us</h3>
                       <ul class="footer-address" style="margin-left: 15px;">
                           <li><i class="fa fa-map-marker custom_icon"></i> Address:   {{@$contact->address1}} </li>
                           <li><i class="fa fa-phone custom_icon"></i> Phone:  {{@$contact->mobile1}}</li>
                           <li> <i class="fa fa-envelope custom_icon"></i> Email: {{@$contact->email1}}</li>
                       </ul>                      
                   </div>
               </div>
               <div class="col-lg-3 md-mb-30">
                   <div class="footer-widget footer-widget-3">
                       <h3 class="footer-title"> Membership</h3>
                       <div class="footer-menu">
                           <ul>
                                <li> <a href="{{route('frontend.privacy-policy')}}"> Privacy Policy </a> </li>
                                <li> <a href="{{route('frontend.term-condition')}}"> Term & Condition </a> </li>
                                <li> <a href="{{route('frontend.volunteer-signup')}}">Join As a Member</a></li>
                                <li> <a href="{{route('frontend.membership')}}">Our Membership</a></li>
                                <li> <a href="{{route('frontend.blood-donate')}}"> 🔴 Donate Blood </a> </li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 md-mb-30">
                   <div class="footer-widget footer-widget-2">
                       <h3 class="footer-title"> Necessary Links</h3>
                       <div class="footer-menu">
                           <ul>
                               <li><a href="{{route('frontend.about.us')}}">About Us</a></li>
                               <li><a href="{{route('our.photo-gallery')}}">Gallery</a></li>
                               <li><a href="{{route('frontend.our-events')}}">News & Events</a></li>
                               <li><a href="{{route('frontend.contact.us')}}">Contact</a></li>
                               <!-- <li><a href="{{route('login')}}">Login</a></li> -->
                           </ul>
                       </div>
                   </div>
               </div>
               
           </div>
       </div>
    </div>
   
   <div class="copyright">  
       <div class="container">                  
           <div class="react-copy-left">Copyright © {{@$contact->name_en}} 
                <!-- <a href="https://innovativeitsolutionsltd.com/" target="_blank" style="color: #8dde11;font-size: 15px;font-weight: bold;margin-left: 20px;">Developed by # PopularSoft</a>  -->
            </div>
           <div class="react-copy-right">
               <ul class="social-links">
                   <li class="follow">Follow us</li>
                   <li><a href="{{@$contact->facebook}}" target="_blank"><span aria-hidden="true" class="fa fa-facebook"></span></a></li>
                   <li><a href="{{@$contact->twitter}}" target="_blank"><span aria-hidden="true" class="fa fa-twitter"></span></a></li>
                   <li><a href="{{@$contact->instagram}}" target="_blank"><span aria-hidden="true" class="fa fa-instagram"></span></a></li>
                   <li><a href="{{@$contact->linkedin}}" target="_blank"><span aria-hidden="true" class="fa fa-linkedin"></span></a></li>
                   <li><a href="{{@$contact->tiktok}}" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                   <li><a href="{{@$contact->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
               </ul>
           </div>
       </div>
   </div>
</footer>
<!--================= Footer Section End Here =================-->