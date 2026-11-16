<!--================= News & Events Section Start Here =================-->
<style>
    /* ব্যাকগ্রাউন্ড সাদা করা হয়েছে */
    .byvn-news { background: #ffffff; padding: 80px 0 90px; }

    .byvn-news-card {
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.4s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03); /* হালকা ডিফল্ট শ্যাডো */
    }
    
    /* মাউস নিলে কার্ড উপরে উঠবে এবং শ্যাডো গাঢ় হবে */
    .byvn-news-card:hover { 
        transform: translateY(-8px); 
        box-shadow: 0 15px 35px rgba(11, 90, 52, 0.1); 
        border-color: #d1e0d6;
    }

    .byvn-news-img { display: block; height: 220px; overflow: hidden; }
    .byvn-news-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
    .byvn-news-card:hover .byvn-news-img img { transform: scale(1.08); }

    .byvn-news-body { padding: 25px 25px 28px; display: flex; flex-direction: column; flex: 1; }
    
    /* ডেট ডিজাইন */
    .byvn-news-date {
        align-self: flex-start;
        background: #f0f7f2; 
        color: #0b5a34;
        font-size: 13px; 
        font-weight: 700;
        padding: 6px 15px; 
        border-radius: 20px; 
        margin-bottom: 16px;
        letter-spacing: 0.5px;
    }
    
    .byvn-news-title {
        font-size: 18px; 
        font-weight: 700; 
        line-height: 1.5; 
        margin-bottom: 20px;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    }
    .byvn-news-title a { color: #1b1b1b; text-decoration: none; transition: color 0.3s; }
    .byvn-news-title a:hover { color: #0b5a34; }
    
    /* রিড মোর লিংক */
    .byvn-news-more { margin-top: auto; font-weight: 700; color: #D2093C; text-decoration: none; display: inline-flex; align-items: center; font-size: 15px;}
    .byvn-news-more i { margin-left: 8px; transition: margin .2s; }
    .byvn-news-more:hover { color: #a3062d; }
    .byvn-news-more:hover i { margin-left: 14px; }

    /* All Events বাটন */
    .byvn-all-btn {
        display: inline-block; 
        background: #0b5a34;
        border: 2px solid #0b5a34; 
        color: #fff;
        font-weight: 700; 
        padding: 12px 35px; 
        border-radius: 30px;
        text-decoration: none; 
        transition: all .3s ease;
        font-size: 16px;
    }
    .byvn-all-btn:hover { 
        background: #fff; 
        color: #0b5a34; 
        box-shadow: 0 5px 15px rgba(11, 90, 52, 0.15);
    }
</style>

<div class="byvn-news">
    <div class="container">
        <!-- সেকশন টাইটেল -->
        <div class="section-title-area text-center home-five mb---50" style="margin-bottom: 40px;">
            <div class="section-title">News & Events</div>
        </div>

        <div class="row g-4">
            @foreach($notice_all as $notice)
            <div class="col-xl-3 col-md-6">
                <div class="byvn-news-card">
                    <a class="byvn-news-img" href="{{ route('frontend.our-events.details', $notice->id) }}">
                        <img src="{{ (!empty($notice->image)) ? url('uploads/notice_files/'.$notice->image) : url('uploads/no_image.png') }}" alt="{{ $notice->title_en }}">
                    </a>
                    <div class="byvn-news-body">
                        <span class="byvn-news-date"><i class="fa fa-clock" style="margin-right: 5px;"></i> {{ date('d-m-Y', strtotime($notice->date)) }}</span>
                        <h3 class="byvn-news-title">
                            <a href="{{ route('frontend.our-events.details', $notice->id) }}">{{ $notice->title_en }}</a>
                        </h3>
                        <a class="byvn-news-more" href="{{ route('frontend.our-events.details', $notice->id) }}">Read More <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- All Events বাটন -->
        <div class="text-center" style="margin-top: 50px;">
            <a href="{{ route('frontend.our-events') }}" class="byvn-all-btn">All Events <i class="fa-solid fa-arrow-right-long" style="margin-left: 8px;"></i></a>
        </div>
    </div>
</div>
<!--================= News & Events Section End Here =================-->