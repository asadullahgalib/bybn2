<!--================= Our Activities Section Start Here =================-->
<div class="react-upcoming__event blog__area" style="padding:30px 0px 50px 0px;background: #E7F6EA;">
    <div class="container">
        <div class="react__title__section text-center">
            <h2 class="react__tittle">Our Activitiess</h2>
        </div>
        <div class="event-slider owl-carousel">
            @foreach($activities as $activity)
            <div class="event__card">
                <div class="event__card--content">
                    <div class="event__card--content-area">
                        <div class="event__card--date">
                            <img src="{{asset('uploads/service_category_images/'.$activity->image)}}" alt="Icon image">
                        </div>
                        <h3 class="event__card--title" style="padding: 0px 0px 15px 0px;"><a href="{{route('frontend.service.category.details',$activity->id)}}">{{$activity->name}}</a></h3>
                        <a class="event__card--link" href="{{route('frontend.service.category.details',$activity->id)}}"> Read More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>                        
    </div>
</div>
<!--================= Our Activities Section End Here =================-->