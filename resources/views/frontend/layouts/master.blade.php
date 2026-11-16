<!DOCTYPE html>
<html lang="zxx">
<head>
        @php
            $meta = App\Model\Meta::first();
        @endphp
        <!--================= Meta tag =================-->
        <meta charset="utf-8">
        <title>{{@$contact->name_en}}</title>
        <meta name="description" content="{{@$meta->description}}">
        <meta name="keywords" content="{{@$meta->keyword}}">
        <meta name="author" content="{{@$meta->author}}">
        <link rel="canonical" href="{{@$meta->canonical_link}}">
        <!--================= Responsive Tag =================-->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--================= Favicon =================-->
        <link rel="apple-touch-icon" href="{{asset('frontend/login/images/icon.jpg')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/login/images/icon.jpg')}}">
        <!--================= Jquery latest version =================-->
        <script src="{{asset('frontend')}}/assets/js/jquery.min.js"></script>       
        <!--================= Bootstrap V5 css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
        <!--================= Menus css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/menus.css">               
        <!--================= Animate css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/animate.css">
        <!--================= Owl Carousel css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/owl.carousel.css">
        <!--================= Elegant icon css  =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/fonts/elegant-icon.css">
        <!--================= Fontawesome icon css  =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/all.min.css">
        <!--================= Magnific Popup css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/magnific-popup.css">
        <!--================= Animations css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/animations.css">  
        <!--=================Swiper slider css  =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/swiper.min.css">
        <!--================= Magnific Popup css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/style.css">
        <!--================= Custom Spacing css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/custom-spacing.css">
        <!--================= Responsive css =================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/responsive.css">
        <link rel="stylesheet" href="{{asset('frontend')}}/assets/font-awesome/css/font-awesome.min.css">
        <!-- sweet alert -->
        <link href="{{asset('pike/backend/css/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-ZuU8bdMRRRY62aO4Vf6XCHUMJUr+ClE8O0ozGQ3vbwS2A3QgFydXeZK0RbH9ZpgRnS7I0jLlCq9aT9E7t+dxhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- sweet alert -->
        <script src="{{ asset('pike/backend/js/sweetalert.js') }}"></script>
        <style type="text/css">
            a.custom_menu {
                color: #D2093C !important;
            }
            .single_page_title{
                margin-top: -110px;
            }
            @media only screen and (min-width:320px) and (max-width:768px) {
                .mobile_top_service{
                    display:none !important;
                }
                .single_page_title{
                    margin-top: -85px !important;
                }
             }
        </style>
    </head>
    <body> 
        <!--================= Preloader Section Start Here =================-->        
        <div id="react__preloader">
            <div id="react__circle_loader"></div>
            <div class="react__loader_logo"><img src="{{asset('uploads/contact_images/'.@$contact->image)}}" alt="Preload"></div>
        </div>        
        <!--================= Preloader Section End Here =================-->

        @include('frontend.layouts.header')

        <!--================= Wrapper Start Here =================-->
        <div class="react-wrapper">
            <div class="react-wrapper-inner">
                @yield('content')
            </div>
        </div>
        <!--================= Wrapper End Here =================-->

        @include('frontend.layouts.footer')

        @if(Session::get('ContactMessage'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Submitted!","Your message is successfully sent.","success");
            </script>
        @endif

        @if(Session::get('VolunteerMessage'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Congrations!","Your registration is successfully completed","success");
            </script>
        @endif

        @if(Session::get('DonateMessage'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Thanks!","Your data is successfully sent","success");
            </script>
        @endif
        
        <!--================= Scroll to Top Start =================-->
        <div id="backscrollUp" class="home">
            <span aria-hidden="true" class="arrow_carrot-up"></span>
        </div> 
        <!--================= Scroll to Top End =================-->

        
        <script src="{{ asset('pike/backend/js/validate.min.js') }}"></script>
        <script src="{{ asset('pike/backend/js/additional-methods.js') }}"></script>
        <!--================= Modernizr js =================-->
        <script src="{{asset('frontend')}}/assets/js/modernizr-2.8.3.min.js"></script>
        <!--================= Bootstrap js =================-->
        <script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>
        <!--================= Owl Carousel js =================-->
        <script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>
        <!--================= Magnific Popup =================-->
        <script src="{{asset('frontend')}}/assets/js/jquery.magnific-popup.min.js"></script>
        <!--================= swiper slider js =================-->
        <script src="{{asset('frontend')}}/assets/js/swiper-bundle.min.js"></script>
        <!--================= Counter up js =================-->
        <script src="{{asset('frontend')}}/assets/js/jquery.counterup.min.js"></script>
        <script src="{{asset('frontend')}}/assets/js/waypoints.min.js"></script>
        <!--================= Wow js =================-->
        <script src="{{asset('frontend')}}/assets/js/wow.min.js"></script>                
        <!--================= menus js =================-->
        <script src="{{asset('frontend')}}/assets/js/menus.js"></script>
        <!--================= Plugins js =================-->
        <script src="{{asset('frontend')}}/assets/js/plugins.js"></script>       
        <!--================= Main js =================-->
        <script src="{{asset('frontend')}}/assets/js/main.js"></script>
        <script src="{{ asset('pike/backend/js/validate.min.js') }}"></script>
        <script src="{{ asset('pike/backend/js/additional-methods.js') }}"></script>
        <script>
            // dropdown show & hide
            $(".campus-dropdown-item > .showed").on("click", function () {
                var element = $(this).parent(".campus-dropdown-item");
                if (element.hasClass("active")) {
                    element.removeClass("active");
                } else {
                    element.siblings(".campus-dropdown-item").removeClass('active');
                    element.addClass("active");
                }
            });
        </script>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#image').change(function(e){
              var reader = new FileReader();
              reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
              }
              reader.readAsDataURL(e.target.files['0']);
            });
          });
        </script>
    </body>
</html>