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
                     <h1 class="breadcrumbs-title">About Us</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>About Us</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>                
 </div>
 <!--================= Breadcrumbs Section End Here =================-->

<!--=================  About Section Start Here ================= -->
<div class="about__area about__area_one p-relative pt---10 pb---120" style="background: #edf3f8;">
    <div class="container">                        
        <div class="row">
            <div class="col-lg-6">
                <div class="about__content">
                    <h2 class="about__title">ABOUT <br> <em style="text-transform: uppercase;"> {{@$contact->name_en}}</em></h2>
                    <?php echo @$about->description_en; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__image" style="padding: 70px 20px;">
                    <img src="{{asset('uploads/about_images/'.@$about->image)}}" alt="About">
                </div>
            </div>
        </div>
    </div>
</div>
<!--================= About Section End Here ================= -->
@endsection