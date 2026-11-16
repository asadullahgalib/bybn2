<!--=================  Popular Topics Section Start Here ================= -->
<div class="react_populars_topics react_populars_topics2 pt---100 pb---100">
    <div class="container"> 
        <div class="react__title__section react__title__section-all">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- <h6>Our Serviceses</h6> -->
                    <h2 class="react__tittle"> Our Products </h2>
                </div>                                
            </div>
            
        </div>                       
        <div class="row pt---30">
            @foreach($service_home_categories as $scategory)
            <div class="col-md-4">
                <div class="item__inner">                                    
                    <div class="icon">
                        <a href="{{route('frontend.service.category.details',$scategory->id)}}">
                            <img src="{{asset('uploads/service_category_images/'.$scategory->image)}}" alt="Icon image">
                        </a>
                    </div>
                    <div class="react-content">
                        <h3 class="react-title"><a href="{{route('frontend.service.category.details',$scategory->id)}}">{{$scategory->name}}</a></h3>
                        <a href="{{route('frontend.service.category.details',$scategory->id)}}"> Read More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                    </div>                                    
                </div>
            </div>
            @endforeach                    
        </div>
    </div>
</div>
<!--=================  Popular Topics Section End Here ================= -->