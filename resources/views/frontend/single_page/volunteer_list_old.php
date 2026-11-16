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
                     <h1 class="breadcrumbs-title">Membership</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Membership</li>
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
            <div class="col-xl-3 col-md-6">
                <div class="journey-card">
                    <div class="journey-card-picture"><a href="#"><img src="{{(!empty($principal->image))?url('uploads/principal_images/'.$principal->image):url('uploads/no_image.png')}}" alt="card-picture"></a></div>
                    <h4 style="text-align: center;font-weight: bold;margin-top: 20px;margin-bottom: 10px;">{{@$principal->name_en}}</h4>
                    <p style="font-size: 15px;font-weight: bold;text-align: center;">{{@$principal->designation_en}}</p>
                </div>
            </div>
            <div class="col-xl-9 col-md-9">
                <div class="journey-card">
                    <?php echo @$principal->description_en; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=================  Journey End Here  =================-->

 <!--================= Breadcrumbs Section End Here =================-->
<div class="instructors___page pt---120 pb---140">
    <div class="container pb---60">                        
        <div class="row">
            @foreach($teachers as $teacher)
            <div class="col-lg-3" style="margin-bottom: 15px;">
                <div class="instructor__content">
                    <div class="instructor__image">
                        <img src="{{(!empty($teacher->image))?url('uploads/employee_images/'.$teacher->image):url('uploads/no_image.png')}}" alt="course instructor">
                        <div class="content__hover" style="text-align:center;">
                            <h4 style="color: #fff;margin-bottom: 5px;font-weight: bold;">{{$teacher->name}}</h4>
                            <p>{{$teacher->designation}}</p>
                            <div style="margin-bottom:20px"></div>
                            <a href="{{route('frontend.about.us')}}" class="more-about" style="background: #dfdddd;padding: 15px 35px;border-radius: 25px;color: red;"> Explore More <span class="fa fa-arrow-right"></span></a>
                        </div>
                    </div>                                    
                    <div class="bottom-content"> 
                        <h4 style="background: #0f4861;padding: 13px 0px;border-radius: 17px;width: 90%;margin-left: 5%;margin-bottom: 30px;"><a href="#" style="color:#fff;">{{$teacher->name}}</a></h4>
                        <a href="{{route('frontend.about.us')}}" class="more-about" style="background: #dfdddd;padding: 15px 35px;border-radius: 25px;color: red;"> Explore More <span class="fa fa-arrow-right"></span></a>
                    </div>                                 
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection