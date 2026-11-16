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
                     <h1 class="breadcrumbs-title">Activity Details</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Activity Details</li>
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
             <div class="col-lg-7">                                
                 <div class="blog-single-inner">
                     <div class="blog-content">
                         <div class="blog-image" style="margin-bottom: 10px;">
                             <img src="{{ asset('uploads/service_category_images/'.$activity->image) }}" alt="Blog Image" style="width:100%">
                         </div>

                         <h3>{{$activity->name}}</h3>
                         <d style="text-align: justify;">
                            <?php echo @$activity->description_en; ?>
                         </d>
                     </div>
                 </div>                         
             </div>
             <div class="col-lg-5 md-mt-60">
                 <div class="react-sidebar ml----30">
                     <div class="widget back-post">
                         <h3 class="widget-title">Others Activities</h3>
                         <ul class="related-courses">
                             @foreach($recent_services as $ract)
                             <li>
                                 <a href="{{route('frontend.service.category.details',$ract->id)}}"><span class="post-images"><img src="{{(!empty($ract->image))?url('uploads/service_category_images/'.$ract->image):url('uploads/no_image.png')}}" alt="post"></span></a>
                                 <div class="titles">
                                    <h4><a href="{{route('frontend.service.category.details',$ract->id)}}">{{$ract->name}}</a></h4>
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