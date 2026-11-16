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
                     <h1 class="breadcrumbs-title">Privacy Policy</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Privacy Policy</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>                
 </div>
 <!--================= Banner Image End Here =================-->

 <!--=================  Journey Start Here  =================-->
<div class="journey-section home-five pt---120 pb---120">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-md-10 offset-md-1 offset-xl-1">
                <div class="journey-card">
                    <?php echo @$policy->description_en; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=================  Journey End Here  =================-->

@endsection