<!--=================  Journey Start Here  =================-->
<div class="journey-section home-five pt---120 pb---120"  style="background:#fff;padding-bottom: 120px;">
    <div class="container">
        <div class="section-title-area text-center home-five mb---50">
            <div class="section-title">News & Events</div>
        </div>
        <div class="row">
            @foreach($notice_all as $notice)
            <div class="col-xl-3 col-md-6">
                <div class="journey-card">
                    <div class="journey-card-picture">
                        <a href="{{route('frontend.our-events.details',$notice->id)}}">
                            <img src="{{(!empty($notice->image))?url('uploads/notice_files/'.$notice->image):url('uploads/no_image.png')}}" alt="card-picture">
                        </a>
                    </div>
                    <div class="journey-contents">
                        <span class="lessons"><i class="fa fa-clock"></i> {{date('d-m-Y',strtotime($notice->date))}}</span>
                        <div class="card-title" style="margin-bottom: 8px !important;">
                            <a href="{{route('frontend.our-events.details',$notice->id)}}">{{$notice->title_en}}</a>
                        </div>
                        <a href="{{route('frontend.our-events.details',$notice->id)}}" class="more-about" style="background: #dfdddd;padding: 6px 20px;border-radius: 25px;color: red;"> Read More <span class="fa fa-arrow-right"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-xl-12 col-md-6 text-center" style="margin-top: 10px;">
                <a href="{{route('frontend.our-events')}}" class="react-btn-border" style="border: 2px solid rgb(43 23 23 / 30%);"> All Events <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
</div>
<!--=================  Journey End Here  =================-->