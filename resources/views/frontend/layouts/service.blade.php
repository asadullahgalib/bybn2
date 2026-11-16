<!--================= Breadcrumbs Section End Here =================-->
<div class="instructors___page pt---120 pb---140" style="padding-bottom: 25px;">
    <div class="container pb---60">                        
        <div class="row">
            <div class="col-lg-12">
                <h2 class="about__title" style="text-align: center;font-weight: bold;margin-bottom: 35px;">Our Products</h2>
            </div>
            @foreach($services as $service)
            <div class="col-lg-3" style="margin-bottom: 15px;">
                <div class="instructor__content">
                    <div class="instructor__image">
                        <img src="{{(!empty($service->image))?url('uploads/service_images/'.$service->image):url('uploads/no_image.png')}}" alt="course instructor">
                        <div class="content__hover" style="text-align:center;background: #082932;">
                            <a href="{{route('frontend.service.details',$service->id)}}">
                                <h4 style="color: #fff;margin-bottom: 5px;font-weight: bold;">{{$service->title_en}}</h4>
                            </a>
                            <?php echo substr(@$service->description_en,0,150); ?>
                            <a href="{{route('frontend.service.details',$service->id)}}">
                                <div style="margin-bottom:20px"></div>
                            </a>
                            <a href="{{route('frontend.service.details',$service->id)}}" class="more-about" style="background: #dfdddd;padding: 15px 35px;border-radius: 25px;color: red;"> Explore More <span class="fa fa-arrow-right"></span></a>
                        </div>
                    </div>                                    
                    <div class="bottom-content"> 
                        <h4 style="background: #082932;padding: 13px 0px;border-radius: 17px;width: 90%;margin-left: 5%;margin-bottom: 30px;"><a href="{{route('frontend.service.details',$service->id)}}" style="color:#fff;">{{$service->title_en}}</a></h4>
                        <a href="{{route('frontend.service.details',$service->id)}}" class="more-about" style="background: #dfdddd;padding: 15px 35px;border-radius: 25px;color: red;"> Explore More <span class="fa fa-arrow-right"></span></a>
                    </div>                                 
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>