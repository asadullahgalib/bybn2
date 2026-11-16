<!--================= Slider Section Start Here =================-->
 <div class="react-slider-part">
     <div class="home-sliders home2 owl-carousel">
        @foreach($sliders as $key => $slider)
         <div class="single-slide">
             <div class="slider-img">
                 <img class="desktop" src="{{(!empty($slider->image))?url('uploads/slider_images/'.$slider->image):url('uploads/no_image.png')}}" alt="Slider Image 1">
                 <img class="mobile" src="{{(!empty($slider->image2))?url('uploads/slider_mobile_images/'.$slider->image2):url('uploads/no_image.png')}}" alt="Slider Image 1">
             </div>
             <div class="container">
                 <div class="slider-content">
                     <div class="content-part">
                         <h2 class="slider-title">{{$slider->title}}</h2>
                         <!-- <div class="slider-btn">
                             <a href="{{route('frontend.contact.us')}}" class="react-btn-border">Contact</a>
                         </div> -->
                     </div>
                 </div>
             </div>                        
         </div>
        @endforeach
     </div>
 </div>
 <!--================= Slider Section End Here =================--> 