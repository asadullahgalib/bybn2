<!DOCTYPE html>
<html lang="zxx"><head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/meanmenu.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/magnific-popup.min.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/flaticon.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/remixicon.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/odometer.min.css">
      <!-- <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/aos.css"> -->
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/style.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/dark.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/css/responsive.css">
      <link rel="stylesheet" href="{{asset('public/frontend')}}/assets/font-awesome/css/font-awesome.min.css">
      <title>{{@$contact->name_en}}</title>
      <script src="{{asset('public/frontend')}}/assets/js/jquery.min.js"></script>
      <link rel="icon" type="image/png" href="{{asset('public/frontend')}}/assets/images/Logo-02.png">
      <!-- sweet alert -->
      <link href="{{asset('public/pike/backend/css/sweetalert.css')}}" rel="stylesheet" type="text/css" />
      <!-- sweet alert -->
      <script src="{{ asset('public/pike/backend/js/sweetalert.js') }}"></script>
      <link href="{{asset('public/pike/backend/plugins/datetimepicker/css/daterangepicker.css')}}" rel="stylesheet" />
      <style type="text/css">
         .owl-carousel {
            display: none;
            width: 100%;
            z-index: 0 !important; 
         }
         
         .destination_gallery_desktop{
            margin-top: -250px;
         }
         .default-btn-customize{
             background-color: transparent;
             color: #111;
             padding: 10px 30px;
             border-radius: 30px;
             position: relative;
             transition: all ease .1s;
             border: 2px solid #101F3C;
             z-index: 1;
             font-weight: bold !important;
             font-size: 16px !important;
         }
         @media only screen and (min-width:320px) and (max-width:768px) {
            .mobile_why_choose_hide {
               display: none !important; 
            }
            .mobile_why_choose_show{
               display: block !important;
               width: 150px;
               text-align: center;
               margin-left: 28%;
            }
            .destination_gallery_desktop{
               margin-top: 0px !important;
            }
            .main-logo{
                width: 150px !important;
            }
            .desktop_top_header{
                display: none !important;
            }
            .mobile_top_header{
                display: block !important;
            }
            .mobile_gallery_img{
                width: 25% !important;
            }
         }
      </style>
   </head>
   <body>
      <!-- <div class="preloader-area">
         <div class="spinner">
            <div class="inner">
               <div class="disc"></div>
               <div class="disc"></div>
               <div class="disc"></div>
            </div>
         </div>
      </div> -->
      
      @include('frontend.layouts.header')
        @yield('content')
      @include('frontend.layouts.footer')

      @if(Session::get('ContactMessage'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Submitted!","Your message is successfully sent.","success");
            </script>
      @endif

      @if(Session::get('HelpMessage'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Submitted!","Your message is successfully sent.","success");
            </script>
      @endif

      @if(Session::get('AppointmentMessage'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Appointment Booked!","Thank you for booking appointment","success");
            </script>
      @endif

      @if(Session::get('ApplyMessage'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Application Submitted!","Thank you for your application.","success");
            </script>
      @endif

      @if(Session::get('applicantUpdateMsg'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Registered!","Your Registration is successfully completed.","success");
            </script>
      @endif

      @if(Session::get('registrationMessage'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Registered!","Your Registration is successfully completed. ","success");
            </script>
      @endif

      @if(Session::get('verifySuccessMessage'))
            <script type="text/javascript" charset="utf-8" async defer>
                swal("Verified!","Your pin code is verified, Now fill up your details. ","success");
            </script>
      @endif

      <div class="go-top">
         <i class="ri-arrow-up-s-line"></i>
         <i class="ri-arrow-up-s-line"></i>
      </div>
      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      <script src="{{asset('public/frontend')}}/assets/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('public/frontend')}}/assets/js/jquery.meanmenu.js"></script>
      <script src="{{asset('public/frontend')}}/assets/js/owl.carousel.min.js"></script>
      <script src="{{asset('public/frontend')}}/assets/js/jquery.magnific-popup.min.js"></script>
      <script src="{{asset('public/frontend')}}/assets/js/aos.js"></script>
      <script src="{{asset('public/frontend')}}/assets/js/odometer.min.js"></script>
      <script src="{{asset('public/frontend')}}/assets/js/appear.min.js"></script>
      <script src="{{ asset('public/pike/backend/js/validate.min.js') }}"></script>
      <script src="{{ asset('public/pike/backend/js/additional-methods.js') }}"></script>
      <script src="{{asset('public/frontend')}}/assets/js/ajaxchimp.min.js"></script>
      <script src="{{asset('public/frontend')}}/assets/js/custom.js"></script>
      <script src="{{asset('public/pike/backend/plugins/datetimepicker/js/moment.min.js')}}"></script>
      <script src="{{asset('public/pike/backend/plugins/datetimepicker/js/daterangepicker.js')}}"></script>
      <script src="{{asset('public/pike/backend/plugins/jquery.filer/js/tstjquery.filer.min.js')}}"></script>
      <!-- Start Java Script for Date time Picker -->
        <script type="text/javascript">
            $(function() {
              var today = new Date();
              var tomorrow = new Date();
              tomorrow.setDate(today.getDate() + 1);
              $('.singledatepicker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                  // drops: "up",
                  autoApply:true,
                  locale: {
                    format: 'DD-MM-YYYY',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    firstDay: 0
                  },
                  minDate: tomorrow,
                },
                function(start) {
                  this.element.val(start.format('DD-MM-YYYY'));
                  this.element.parent().parent().removeClass('has-error');
                },
                function(chosen_date) {
                  this.element.val(chosen_date.format('DD-MM-YYYY'));
                });

              $('.singledatepicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY'));
                $(this).trigger('change');
              });
            });
      </script>
        <!-- End Java Script for Data time Picker -->
   </body>
</html>