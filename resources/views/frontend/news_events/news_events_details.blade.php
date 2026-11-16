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
                     <h1 class="breadcrumbs-title">News & Events Details</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>News & Events Details</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>                
 </div>
 <!--================= Breadcrumbs Section End Here =================-->

<!--================= Course Filter Section Start Here =================-->
 <div class="back__course__page_grid react-courses__single-page pb---40 pt---110">
     <div class="container pb---70">
         <div class="row">
             <div class="col-lg-8">                                
                 <div class="blog-single-inner">
                     <div class="blog-content">
                         <div class="blog-image" style="margin-bottom: 10px;">
                             <img src="{{(!empty($notice->image))?url('uploads/notice_files/'.$notice->image):url('uploads/no_notice.png')}}" alt="Blog Image" style="width:100%">
                         </div>
                         <span class="lessons"><i class="fa fa-clock"></i> {{date('d-m-Y',strtotime($notice->date))}}</span>
                         <h3>{{$notice->title_en}}</h3>
                         <?php echo @$notice->description_en; ?>
                     </div>
                 </div>                         
             </div>
             <div class="col-lg-4 md-mt-60">
                 <div class="react-sidebar ml----30">
                     <div class="widget back-post">
                         <h3 class="widget-title">Recent News & Events</h3>
                         <ul class="related-courses">
                             @foreach($recent_notice as $course)
                             <li>
                                 <a href="{{route('frontend.our-events.details',$course->id)}}"><span class="post-images"><img src="{{(!empty($course->image))?url('uploads/notice_files/'.$course->image):url('uploads/no_image.png')}}" alt="post"></span></a>
                                 <div class="titles">   
                                    <span class="lessons"><i class="fa fa-clock"></i> {{date('d-m-Y',strtotime($course->date))}}</span>
                                    <h4><a href="{{route('frontend.our-events.details',$course->id)}}">{{$course->title_en}}</a></h4>
                                 </div>
                             </li>
                             @endforeach 
                         </ul>
                     </div>                              
                 </div>
             </div>
         </div>
     </div>
 </div>                
 <!--================= Course Filter Section End Here =================--> 

@endsection