<!--=================  About Section Start Here ================= -->
<div class="about__area about__area_one p-relative pt---10 pb---120" style="background: #fff;">
    <div class="container">                        
        <div class="row">
            <div class="col-lg-6">
                <div class="about__image" style="padding: 70px 20px;">
                    <img src="{{asset('uploads/about_images/'.@$about->image)}}" alt="About">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <h2 class="about__title">ABOUT <br> <em style="text-transform: uppercase;"> {{@$contact->name_en}}</em></h2>
                    <?php echo substr(@$about->description_en,0,1200); ?>
                    <ul>
                        <li><a href="{{route('frontend.about.us')}}" class="more-about"> Read More <span class="fa fa-arrow-right"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================= About Section End Here ================= -->