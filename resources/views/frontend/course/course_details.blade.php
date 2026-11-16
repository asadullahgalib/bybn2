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
                     <h1 class="breadcrumbs-title">Program Details</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Program Details</li>
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

                         <h3>{{$course->name}}</h3>

                         <div class="blog-image" style="margin-bottom: 10px;">
                             <img src="{{(!empty($course->image))?url('uploads/course_images/'.$course->image):url('uploads/no_image.png')}}" alt="Blog Image" style="width:100%">
                         </div>

                         <?php echo @$course->description_en; ?>
                     </div>
                 </div>                         
             </div>
             <div class="col-lg-4 md-mt-60">
                 <div class="react-sidebar ml----30">
                     <div class="widget back-post">
                         <h3 class="widget-title">POPULAR PROGRAMS</h3>
                         <ul class="related-courses">
                             @foreach($recent_courses as $rcourse)
                             <li>
                                 <a href="{{route('frontend.course.details',$rcourse->id)}}"><span class="post-images"><img src="{{(!empty($rcourse->image))?url('uploads/course_images/'.$rcourse->image):url('uploads/no_image.png')}}" alt="post"></span></a>
                                 <div class="titles">                                                    
                                     <h4><a href="{{route('frontend.course.details',$rcourse->id)}}">{{$rcourse->name}}</a></h4>
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