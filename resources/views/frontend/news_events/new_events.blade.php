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
                     <h1 class="breadcrumbs-title"> News & Events </h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li> News & Events </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>                
 </div>
 <!--================= Breadcrumbs Section End Here =================-->

<!--=================  Journey Start Here  =================-->
<div class="journey-section home-five pt---120 pb---120" style="padding-bottom: 120px;">
    <div class="container">
        <div class="row">
            @foreach($notice_all as $notice)
            <div class="col-xl-3 col-md-6">
                <div class="journey-card">
                    <div class="journey-card-picture"><a href="{{route('frontend.our-events.details',$notice->id)}}"><img src="{{(!empty($notice->image))?url('uploads/notice_files/'.$notice->image):url('uploads/no_image.png')}}" alt="card-picture"></a></div>
                    <div class="journey-contents">
                        <span class="lessons"><i class="fa fa-clock"></i> {{date('d-m-Y',strtotime($notice->date))}}</span>
                        <div class="card-title" style="margin-bottom: 8px !important;"><a href="{{route('frontend.our-events.details',$notice->id)}}">{{$notice->title_en}}</a></div>
                        <a href="{{route('frontend.our-events.details',$notice->id)}}" class="more-about" style="background: #dfdddd;padding: 6px 20px;border-radius: 25px;color: red;"> Read More <span class="fa fa-arrow-right"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--=================  Journey End Here  =================-->

@endsection