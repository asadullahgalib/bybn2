<!--================= Breadcrumbs Section End Here =================-->
<div class="instructors___page pt---120 pb---140" style="padding-bottom: 25px;background: #edf3f8;">
    <div class="container pb---60">                        
        <div class="row">
            <div class="col-lg-12">
                <h2 class="about__title" style="text-align: center;font-weight: bold;margin-bottom: 35px;">Immigration & visa Countries</h2>
            </div>
            @foreach($countries as $country)
            <div class="col-lg-2" style="margin-bottom: 15px;">
                <div class="instructor__content">
                    <div class="instructor__image">
                        <img src="{{(!empty($country->image))?url('uploads/country_images/'.$country->image):url('uploads/no_image.png')}}" alt="course instructor">
                        <div class="content__hover" style="text-align:center;background: #082932;margin-bottom: 0px;">
                            <a>
                                <h4 style="color: #fff;margin-bottom: 5px;font-weight: bold;">{{$country->name}}</h4>
                            </a>
                        </div>
                    </div>                                 
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>