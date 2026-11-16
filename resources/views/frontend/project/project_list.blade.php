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
                     <h1 class="breadcrumbs-title">Projects</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Projects</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>                
 </div>
 <!--================= Breadcrumbs Section End Here =================-->

<!--================= Breadcrumbs Section End Here =================-->
<div class="instructors___page pt---120 pb---140" style="padding-bottom: 25px;">
    <div class="container pb---60">                        
        <div class="row">
            @foreach($projects as $project)
            <div class="col-lg-3" style="margin-bottom: 15px;">
                <div class="instructor__content">
                    <div class="instructor__image">
                        <img src="{{(!empty($project->image))?url('uploads/project_images/'.$project->image):url('uploads/no_image.png')}}" alt="course instructor">
                        <div class="content__hover" style="text-align:center;background: #082932;">
                            <a href="{{route('frontend.project.details',$project->id)}}">
                                <h4 style="color: #fff;margin-bottom: 5px;font-weight: bold;">{{$project->title_en}}</h4>
                            </a>
                            <?php echo substr(@$project->description_en,0,150); ?>
                            <a href="{{route('frontend.project.details',$project->id)}}">
                                <div style="margin-bottom:20px"></div>
                            </a>
                            <a href="{{route('frontend.project.details',$project->id)}}" class="more-about" style="background: #dfdddd;padding: 15px 35px;border-radius: 25px;color: red;"> Read More <span class="fa fa-arrow-right"></span></a>
                        </div>
                    </div>                                    
                    <div class="bottom-content"> 
                        <h4 style="background: #082932;padding: 13px 0px;border-radius: 17px;width: 90%;margin-left: 5%;margin-bottom: 30px;"><a href="{{route('frontend.project.details',$project->id)}}" style="color:#fff;">{{$project->title_en}}</a></h4>
                        <a href="{{route('frontend.project.details',$project->id)}}" class="more-about" style="background: #dfdddd;padding: 15px 35px;border-radius: 25px;color: red;"> Read More <span class="fa fa-arrow-right"></span></a>
                    </div>                                 
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection