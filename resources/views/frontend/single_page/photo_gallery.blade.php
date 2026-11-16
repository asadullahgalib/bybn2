@extends('frontend.layouts.master')
@section('content')
<style>
    .gallery-item {
        position: relative;
        overflow: hidden;
    }
    .gallery-item img {
        width: 100%;
        height: auto;
        display: block;
    }
    .gallery-icon {
        position: absolute;
        bottom: 10px;
        right: 10px;
        color: #fff;
        font-size: 20px;
        background: rgba(0, 0, 0, 0.5);
        padding: 5px;
        border-radius: 50%;
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
                     <h1 class="breadcrumbs-title">Gallery</h1>
                     <div class="back-nav">
                         <ul>
                             <li><a href="{{url('')}}">Home</a></li>
                             <li>Gallery</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>                
 </div>
 <!--================= Breadcrumbs Section End Here =================-->

<!--================= Gallery Section Start Here ================= -->
<div class="gallery-section-six" style="padding: 65px 0px 100px 0px;">
    <div class="container">
        <div class="row gallery-grid">
            @foreach($photo_galleries as $index => $gallery)
                <div class="col-md-3 col-sm-4 col-6 gallery-item mb-4">
                    <a href="{{ asset('uploads/gallery_images/'.$gallery->image) }}"
                       class="gallery-popup"
                       title="{{ $gallery->title }}">
                        <img src="{{ asset('uploads/gallery_images/'.$gallery->image) }}"
                             alt="{{ $gallery->title }}"
                             class="img-fluid rounded shadow-sm" />
                        <i class="fa-solid fa-circle-plus gallery-icon"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--================= Gallery Section End Here ================= -->

<script>
    $(document).ready(function() {
        $('.gallery-grid').magnificPopup({
            delegate: 'a.gallery-popup', // child item selector
            type: 'image',
            gallery: {
                enabled: true, // enable gallery mode
                navigateByImgClick: true,
                preload: [0,1]
            },
            mainClass: 'mfp-zoom-in',
            removalDelay: 300
        });
    });
</script>

@endsection