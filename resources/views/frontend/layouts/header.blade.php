<!--================= Header Section Start Here =================-->
  <header id="react-header" class="react-header">
      <div class="topbar-area style1">
          <div class="container">
              <div class="row">
                  <div class="col-lg-7">
                      <div class="topbar-contact">
                         <ul>                                   
                             <li>
                                 <i class="fa fa-phone"></i> 
                                 <a> {{@$contact->mobile1}}</a>
                             </li>
                             @if(@$contact->mobile2 !=null)
                             <li>
                                 <i class="fa fa-phone"></i> 
                                 <a> {{@$contact->mobile2}}</a>
                             </li>
                             @endif
                             <li>
                                 <i class="fa fa-envelope"></i> 
                                 <a href="mailto:{{@$contact->email}}"> {{@$contact->email1}}</a>
                             </li>
                             
                         </ul>
                      </div>
                  </div>
                  <div class="col-lg-5 text-right">
                      <div class="toolbar-sl-share">
                          <ul class="social-links">
                              <li><a href="{{@$contact->facebook}}" target="_blank"><span aria-hidden="true" class="fa fa-facebook"></span></a></li>
                              <li><a href="{{@$contact->twitter}}" target="_blank" style="padding: 5px 10px;"><span aria-hidden="true" class="fa fa-twitter"></span></a></li>
                              <li><a href="{{@$contact->instagram}}" target="_blank" style="padding: 5px 10px;"><span aria-hidden="true" class="fa fa-instagram"></span></a></li>
                              <li><a href="{{@$contact->linkedin}}" target="_blank" style="padding: 5px 10px;"><span aria-hidden="true" class="fa fa-linkedin"></span></a></li>
                              <li><a href="{{@$contact->tiktok}}" target="_blank" style="padding: 5px 10px;"><i class="fab fa-tiktok"></i></a></li>
                              <li><a href="{{@$contact->youtube}}" target="_blank" style="padding: 5px 10px;"><i class="fab fa-youtube"></i></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="menu-part">
          <div class="container">
              <!--================= Menu Start Here =================-->
              <div class="react-main-menu">
                  <nav>
                      <!--================= Menu Toggle btn =================-->
                      <div class="menu-toggle">
                          <div class="logo"><a href="{{url('')}}" class="logo-text"> <img src="{{asset('uploads/contact_images/'.@$contact->image)}}" alt="logo" style="width: 150px;"> </a></div>
                          <button type="button" id="menu-btn">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>
                      </div>
                      <!--================= Menu Structure =================--> 
                      <div class="react-inner-menus">
                          <ul id="backmenu" class="react-menus home react-sub-shadow">
                              <li> <a class="{{(@$page_title=='Home_page')?'custom_menu':''}}" href="{{url('')}}">Home</a></li>
                              <li> <a class="{{(@$page_title=='About_page')?'custom_menu':''}}" href="{{route('frontend.about.us')}}">About Us</a></li>
                              <li> <a class="{{(@$page_title=='Activity')?'custom_menu':''}}" href="{{route('frontend.services')}}">Activities</a></li>
                              <li> <a class="{{(@$page_title=='Project')?'custom_menu':''}}" href="{{route('frontend.projects')}}">Projects</a></li>
                              <li> <a href="#">Membership</a>
                                  <ul>
                                      <li> <a class="{{(@$page_title=='VolunteerSignup_page')?'custom_menu':''}}" href="{{route('frontend.volunteer-signup')}}">Join As a Member</a></li>
                                      <li> <a class="{{(@$page_title=='VolunteerList_page')?'custom_menu':''}}" href="{{route('frontend.membership')}}">Our Membership</a></li>
                                  </ul>
                              </li>
                              <li> <a class="{{(@$page_title=='Gallery_page')?'custom_menu':''}}" href="{{route('our.photo-gallery')}}">Gallery</a></li>
                              <li> <a class="{{(@$page_title=='Events_page')?'custom_menu':''}}" href="{{route('frontend.our-events')}}">News & Events</a></li>
                              <li> <a class="{{(@$page_title=='Contact_page')?'custom_menu':''}}" href="{{route('frontend.contact.us')}}">Contact</a></li>
                              <li> <a class="mobile_donate_bttn {{(@$page_title=='BloodDonation_page')?'custom_menu':''}}" href="{{route('frontend.blood-donate')}}" style="background: #0F4F2C;
                                color: white !important;
                                font-weight: bold;
                                padding: 7px;
                                border-radius: 15px;
                                margin-top: 25px;"> 🔴 Donate Blood </a> </li>

                              <!-- <li> <a class="{{(@$page_title=='Login_page')?'custom_menu':''}}" href="{{route('login')}}"> <i class="fa fa-user"></i> Login</a></li> -->
                          </ul>
                      </div>
                  </nav>
              </div>
              <!--=================  Menu End Here  =================-->
          </div>
      </div>
  </header>
  <!--================= Header Section End Here =================-->