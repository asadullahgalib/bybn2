<!--=================  Blog Start Here  =================-->
<div class="blog-section home-five pt---120 pb---120" style="background:#edf3f8">
    <div class="container">
        <div class="blog-top-area">
            <div class="section-title-area home-five mb---70">
                <div class="section-title">OUR PROGRAMS
                </div>
            </div>
            <div class="blog-slider-navigation">
                <div class="blog-slider-btn blog-slider-prev-btn"><i class="fa-solid fa-angle-left"></i>
                </div>
                <div class="blog-slider-btn blog-slider-next-btn"><i
                        class="fa-solid fa-angle-right"></i>
                </div>
            </div>
        </div>
        <div class="swiper blogSlider-5">
            <div class="swiper-wrapper">
                @foreach($other_courses as $course)
                <div class="swiper-slide">
                    <div class="blog-card">
                        <div class="card-image"><a href="{{route('frontend.course.details',$course->id)}}"><img src="{{(!empty($course->image))?url('uploads/course_images/'.$course->image):url('uploads/no_image.png')}}" alt="card-image"></a></div>
                        <div class="contents">
                            <span class="card-title"><a href="{{route('frontend.course.details',$course->id)}}">{{$course->name}}</a></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--=================  Blog End Here  =================-->