<!--================= Header Section Start Here =================-->
<header id="react-header" class="react-header">
    <!-- টপবার -->
    <div class="topbar-area style1">
        <div class="container">
            <div class="row align-items-center">
                <!-- বাম দিকে: ফোন ও ইমেইল -->
                <div class="col-lg-6 col-md-6">
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="topbar-contact mr-4">
                           <ul class="mb-0">                                   
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
                </div>
                
                <!-- ডান দিকে: প্রফেশনাল বাটনগুলো -->
                <div class="col-lg-6 col-md-6">
                    <div class="header-action-buttons">
                        <a href="{{route('frontend.volunteer-signup')}}" class="action-btn">Become a member</a>
                        
                        <!-- Donate বাটনে লাল রক্তের ফোঁটা আইকন -->
                        <a href="{{route('frontend.blood-donate')}}" class="action-btn">
                            <i class="fa fa-tint blood-drop-icon"></i> Donate
                        </a>
                        
                        <a href="{{route('frontend.contact.us')}}" class="action-btn">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- মেইন মেনু পার্ট -->
    <div class="menu-part">
        <div class="container">
            <div class="react-main-menu">
                <nav>
                    <div class="menu-toggle">
                        <div class="logo"><a href="{{url('')}}" class="logo-text"> <img src="{{asset('uploads/contact_images/'.@$contact->image)}}" alt="logo" style="width: 150px;"> </a></div>
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div class="react-inner-menus">
                        <ul id="backmenu" class="react-menus home react-sub-shadow">
                            <li> <a class="{{(@$page_title=='Home_page')?'custom_menu':''}}" href="{{url('')}}">Home</a></li>
                            <li> <a class="{{(@$page_title=='About_page')?'custom_menu':''}}" href="{{route('frontend.about.us')}}">About Us</a></li>
                            <li> <a class="{{(@$page_title=='Activity')?'custom_menu':''}}" href="{{route('frontend.services')}}">Activities</a></li>
                            <li> <a class="{{(@$page_title=='Project')?'custom_menu':''}}" href="{{route('frontend.projects')}}">Projects</a></li>
                            <li> <a href="#">Membership</a>
                                <ul>
                                    <li> <a class="{{(@$page_title=='VolunteerSignup_page')?'custom_menu':''}}" href="{{route('frontend.volunteer-signup')}}">Join As a Member</a></li>
                                    <li> <a class="{{(@$page_title=='VolunteerList_page')}}?'custom_menu':''" href="{{route('frontend.membership')}}">Our Membership</a></li>
                                </ul>
                            </li>
                            <li> <a class="{{(@$page_title=='Gallery_page')?'custom_menu':''}}" href="{{route('our.photo-gallery')}}">Gallery</a></li>
                            <li> <a class="{{(@$page_title=='News_Events_page')?'custom_menu':''}}" href="{{route('frontend.our-events')}}">News & Events</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!--================= Header Section End Here =================-->