@extends('frontend.layouts.master')
@section('content')
<style>
        .activity-card{
        background:#fff;
        border-radius:10px;
        overflow:hidden;
        transition:.3s;
        box-shadow:0 5px 20px rgba(0,0,0,.08);
        height:100%;
    }

    .activity-card:hover{
        transform:translateY(-8px);
        box-shadow:0 15px 40px rgba(0,0,0,.15);
    }

    .activity-img{
        width:100%;
        height:250px;
        object-fit:contain;
        padding:25px;
        background:#fff;
    }

    .activity-title{
        min-height:55px;
        font-size:24px;
        font-weight:600;
    }

    .activity-title a{
        color:#0B5134;
        text-decoration:none;
    }

    .btn-outline-success{
        border-radius:6px;
    }
</style>
<!--================= Breadcrumbs Section Start Here =================-->
 <div class="react-breadcrumbs">
     <div class="breadcrumbs-wrap">
         <img class="desktop" src="{{asset('uploads/banner_images/'.@$contact->banner)}}" alt="Breadcrumbs">
         <img class="mobile" src="{{asset('uploads/banner_images/'.@$contact->banner)}}" alt="Breadcrumbs">
         <div class="breadcrumbs-inner">
             <div class="container">
                 <div class="breadcrumbs-text single_page_title">
                     <h1 class="breadcrumbs-title">Our Activities</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Our Activities</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>                
 </div>
 <!--================= Breadcrumbs Section End Here =================-->

<!--================= Our Activities Section Start Here =================-->
<div class="react-upcoming__event blog__area py-5" style="background:#E7F6EA;">
    <div class="container">

        <div class="react__title__section text-center mb-5" style="padding-bottom: 0px;">
            <h2 class="react__tittle">Our Activities</h2>
        </div>

        <div class="row g-4">

            @foreach($activities as $activity)

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="activity-card">

                    <a href="{{ route('frontend.service.category.details',$activity->id) }}">
                        <img src="{{ asset('uploads/service_category_images/'.$activity->image) }}"
                             class="activity-img"
                             alt="{{ $activity->name }}">
                    </a>

                    <div class="p-4">

                        <h4 class="activity-title">
                            <a href="{{ route('frontend.service.category.details',$activity->id) }}">
                                {{ $activity->name }}
                            </a>
                        </h4>

                        <a href="{{ route('frontend.service.category.details',$activity->id) }}"
                           class="btn btn-outline-success w-100">
                            Read More
                        </a>

                    </div>

                </div>
            </div>

            @endforeach

        </div>

    </div>
</div>
<!--================= Our Activities Section End Here =================-->
@endsection