<div class="services-area pt-100 pb-70">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-4">
            <div class="services-content">
               <h2>Our Dream Destinations</h2>
               <p>Operating throughout Asia and Africa, Nusiar Education helps international students find their ideal course in Australia, Canada, New Zealand, the UK and the USA.</p>
               <a href="{{route('frontend.study.destination')}}" class="default-btn btn mobile_why_choose_hide">View All Destination</a>
            </div>
         </div>
         <div class="col-lg-8">
            <div class="services-slider owl-carousel owl-theme">
               @foreach($study_destination as $desti)
               <div class="single-services-card">
                  <i class="{{$desti->icon}}"></i>
                  <h3>{{$desti->title_en}}</h3>
                  <p>{{$desti->description}}</p>
                  <a href="{{route('frontend.study.destination.details',$desti->id)}}" class="default-btn btn">Explore More</a>
               </div>
               @endforeach
            </div>
         </div>
         <div class="col-lg-12 text-center">
            <a href="{{route('frontend.study.destination')}}" class="default-btn btn mobile_why_choose_show" style="display: none;">View All Destination</a>
         </div>
      </div>
   </div>
</div>