@extends('backend.layouts.master')
@section('content')
<style type="text/css">
    h4{
        padding-top:10px;
    }
    .card_body{
        border-radius: 5px;
        background-color: #fff;
        height: 110px;
        border: 1px solid #53B4F2;
    }
    .card-clock{
        background: transparent;
        border:none;
    }
    .count_cls{
        font-size: 17px;
        font-weight:bold;
        padding-top: 0px;
        text-align: center;
        color: #000;
    }
    .count_cls:hover{
        font-size: 17px;
        font-weight:bold;
        padding-top: 0px;
        text-align: center;
        color: blue;
    }
    .count_cls a{
        color: #000 !important;
    }
    .count_cls a:hover{
        color: blue !important;
    }
    .sliderImage{
        width:100%;
        height:400px;
        border: 1px solid #53B4F2;
    }
    @media only screen and (min-width:320px) and (max-width:720px){
        .mobile_cls{
            width: 50% !important;
        }
        .sliderImage{
            width:100% !important;
            height:auto !important;
            border: 1px solid #53B4F2;
        }
        .mobile_notice_slider{
            display: block !important;
        }
        .desktop_notice_slider{
            display: none !important;
        }
        .count_cls {
            font-size: 13px !important;
        }
        .mobile_notice_lefit{
            width: 20% !important;
        }
        .mobile_notice_right{
            width: 80% !important;
        }
        .mobile_attend_assignment_img_box{
            width: 45% !important;
        }
        .mobile_attend_assignment_middle_box{
            width: 10% !important;
        }
        .mobile_attend_status{
            width: 50% !important;
        }
        .student_attend_title{
            font-size: 14px !important;
            margin-top: -10px !important;
            font-weight: bold !important;
        }
        .student_assignment_title{
            font-size: 14px !important;
            margin-top: -2px !important;
            font-weight: bold !important;
        }
    }
    .count_img{
        width: 45px;
        border-radius: 10px;
        border: 3px solid powderblue;
    }
    .student_assignment_title{
        font-size: 19px;
    }
    .student_attend_title{
        font-size: 19px;
    }
</style>

@php
    $notices = App\Model\Notice::orderBy('id','desc')->get()->take(10);
    $sliders = App\Model\Slider::orderBy('id','desc')->get()->take(3);
@endphp

<div class="section mobile_notice_slider" style="display:none;margin-top: 55px;margin-bottom: -30px;">
    <div class="card" style="border: 1px solid #53B4F2;margin-bottom:5px;">
        <div class="card-body text-dark" style="padding: 5px;">
            <div class="row">
                <div class="col-md-1 mobile_notice_lefit">
                    <span class="btn btn-info btn-sm btn-block" style="font-weight:bold;background-color: #53B4F2;">Work area:</span>
                </div>
                <div class="col-md-11 mobile_notice_right">
                    <span style="margin-bottom:0px;">
                        <marquee scrollamount="4" style="font-weight: bold;margin-top:5px; ">
                            @foreach($notices as $not)
                                {{$not->title_en}} &nbsp;&nbsp;|&nbsp;&nbsp;
                            @endforeach
                        </marquee>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div id="demo" class="carousel slide" data-ride="carousel" style="margin-bottom:30px;">
      <!-- Indicators -->
      <ul class="carousel-indicators">
        @foreach($sliders as $key => $slid)
        <li data-target="#demo" data-slide-to="{{$key}}" class="{{($key=='0')?'active':''}}"></li>
        @endforeach
      </ul>
      <!-- The slideshow -->
      <div class="carousel-inner">
        @foreach($sliders as $key => $slid)
        <div class="carousel-item {{($key=='0')?'active':''}}">
          <img src="{{url('uploads/slider_images/'.$slid->image)}}" class="sliderImage">
          <div class="carousel-caption">
            <h3>{{$slid->title}}</h3>
          </div>
        </div>
        @endforeach
      </div>
      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
</div>

<div class="container-fluid">

    <div class="row" style="margin-top: 55px;">
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 desktop_notice_slider" style="margin-bottom:5px;">
            <div class="card" style="border: 1px solid #53B4F2;">
                <div class="card-body text-dark" style="padding: 5px;">
                    <div class="row">
                        <div class="col-md-1">
                            <span class="btn btn-info btn-sm btn-block" style="font-weight:bold;background-color: #53B4F2;">Work area:</span>
                        </div>
                        <div class="col-md-11">
                            <span style="margin-bottom:0px;">
                                <marquee scrollamount="4" style="font-weight: bold;margin-top:5px; ">
                                    @foreach($notices as $not)
                                        {{$not->title_en}} &nbsp;&nbsp;|&nbsp;&nbsp;
                                    @endforeach
                                </marquee>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 desktop_notice_slider" style="margin-bottom:30px;">
            <div id="demo2" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ul class="carousel-indicators">
                @foreach($sliders as $key => $slid)
                <li data-target="#demo2" data-slide-to="{{$key}}" class="{{($key=='0')?'active':''}}"></li>
                @endforeach
              </ul>
              <!-- The slideshow -->
              <div class="carousel-inner">
                @foreach($sliders as $key => $slid)
                <div class="carousel-item {{($key=='0')?'active':''}}">
                  <img src="{{url('uploads/slider_images/'.$slid->image)}}" class="sliderImage">
                  <div class="carousel-caption">
                    <h3>{{$slid->title}}</h3>
                  </div>
                </div>
                @endforeach
              </div>
              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#demo2" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo2" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4" style="margin-bottom:30px;">
            <a href="{{route('frontend.projects')}}">
                <div class="card">
                    <div class="card-body text-dark card_body">
                        <p class="count_cls">
                            <img class="count_img" src="{{asset('home/applicant.png')}}"> <br>
                                 <span>Project List</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4" style="margin-bottom:30px;">
            <a href="{{route('web-site.photo.view')}}">
                <div class="card">
                    <div class="card-body text-dark card_body">
                        <p class="count_cls">
                            <img class="count_img" src="{{asset('home/employee.png')}}"> <br>
                                 <span>Photo Gallery</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4" style="margin-bottom:30px;">
            <a href="{{route('web-site.notice.view')}}">
                <div class="card">
                    <div class="card-body text-dark card_body">
                        <p class="count_cls">
                            <img class="count_img" src="{{asset('home/notice.png')}}"> <br>
                                 <span>News & Events</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>


    </div>
    <!-- /.row -->

</div>

@endsection
