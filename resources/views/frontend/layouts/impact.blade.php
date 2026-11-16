<!--================= Our Impact Section Start Here =================-->
<style>
    .byvn-impact { background: #f4f6f5; padding: 50px 0 100px; }

    .byvn-impact-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .byvn-card {
        background: #fff;
        border-radius: 24px; /* কর্নার একটু বেশি গোল করা হয়েছে */
        padding: 35px 30px;
        min-height: 320px;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: 0 8px 24px rgba(0, 0, 0, .06); /* ডিফল্ট শ্যাডো একটু বাড়ানো হয়েছে */
        transition: all .4s cubic-bezier(0.25, 0.8, 0.25, 1);
        cursor: pointer;
        border: 1px solid #f0f4f2; /* হালকা বর্ডার প্রিমিয়াম লুক দেয় */
    }
    .byvn-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 22px 40px rgba(11, 90, 52, .18);
        border-color: #d1e0d6;
    }
    
    .byvn-card h3 { font-size: 26px; font-weight: 800; color: #0b5a34; line-height: 1.3; margin-bottom: 15px; transition: color .35s; }
    .byvn-card p { font-size: 16px; line-height: 1.7; color: #555; margin: 0; transition: color .35s; }

    /* লেখার কার্ড: নিচে দাগ টেনে আসবে */
    .byvn-card-text::after {
        content: "";
        position: absolute; left: 0; bottom: 0;
        height: 6px; width: 0;
        background: linear-gradient(90deg, #0b5a34, #D2093C);
        transition: width .5s ease;
    }
    .byvn-card-text:hover::after { width: 100%; }

    /* ছবির কার্ড */
    .byvn-card-image { padding: 0; }
    .byvn-card-image img {
        width: 100%; height: 100%; object-fit: cover; display: block;
        position: absolute; top: 0; left: 0;
        transition: transform .8s ease;
    }
    .byvn-card-image::after {
        content: "";
        position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(180deg, rgba(11, 90, 52, 0) 40%, rgba(11, 90, 52, .65) 100%);
        opacity: 0; transition: opacity .4s ease;
    }
    .byvn-card-image:hover img { transform: scale(1.12); }
    .byvn-card-image:hover::after { opacity: 1; }

    /* সংখ্যার কার্ড */
    .byvn-stat .byvn-number { font-size: 58px; font-weight: 900; color: #D2093C; line-height: 1; margin-bottom: 10px; transition: all .35s; }
    .byvn-stat .byvn-label { font-size: 22px; font-weight: 700; color: #0b5a34; margin-bottom: 12px; transition: color .35s; }
    .byvn-stat:hover { background: #0b5a34; border-color: #0b5a34; }
    .byvn-stat:hover .byvn-number { color: #fff; transform: translateY(-3px); }
    .byvn-stat:hover .byvn-label { color: #fff; }
    .byvn-stat:hover p { color: rgba(255, 255, 255, .85); }

    /* উদ্ধৃতির কার্ড */
    .byvn-quote { background: #eef5f0; }
    .byvn-quote .byvn-quote-inner { border-left: 5px solid #0b5a34; padding-left: 20px; transition: border-color .35s; }
    .byvn-quote .byvn-quote-icon { 
        width: 50px; height: 50px; background: #fff; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 20px; color: #0b5a34; margin-bottom: 15px; 
        box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: all .35s; 
    }
    .byvn-quote p { font-size: 17px; font-weight: 500; color: #222; font-style: italic; }
    .byvn-quote .byvn-quote-by { margin-top: 15px; font-weight: 700; color: #0b5a34; font-size: 15px; }
    
    .byvn-quote:hover { background: #e1efe5; }
    .byvn-quote:hover .byvn-quote-inner { border-color: #D2093C; }
    .byvn-quote:hover .byvn-quote-icon { color: #fff; background: #D2093C; transform: scale(1.1); }

    /* বাটন */
    .byvn-card .byvn-btn {
        display: inline-block; margin-top: 20px; align-self: flex-start;
        border: 2px solid #0b5a34; color: #0b5a34; font-weight: 700;
        padding: 10px 26px; border-radius: 30px; text-decoration: none; 
        transition: all .3s ease;
    }
    .byvn-card .byvn-btn:hover { background: #0b5a34; color: #fff; box-shadow: 0 6px 15px rgba(11,90,52,0.2); }

    /* রেসপন্সিভ */
    @media (max-width: 1199px) { .byvn-impact-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 575px) {
        .byvn-impact-grid { grid-template-columns: 1fr; gap: 20px; }
        .byvn-card { min-height: 260px; padding: 25px 20px; border-radius: 16px; }
        .byvn-stat .byvn-number { font-size: 46px; }
        .byvn-card h3 { font-size: 22px; }
    }
</style>

<div class="byvn-impact">
    <div class="container">
        <div class="react__title__section text-center" style="padding: 30px 0px 35px 0px;">
            <h2 class="react__tittle">Our Impact</h2>
        </div>

        <div class="byvn-impact-grid">

            <!-- কার্ড ১: লেখা (নিজের লেখা বসাও) -->
            <div class="byvn-card byvn-card-text">
                <h3>তারুণ্যের শক্তি, মানবতার সেবায়</h3>
                <p>Bangladesh Youth Volunteer Network brings young people together for blood donation, relief work and community service.</p>
            </div>

            <!-- কার্ড ২: ছবি -->
            <div class="byvn-card byvn-card-image">
                <img src="{{ asset('uploads/impact_images/impact-1.jpg') }}" alt="Our volunteers">
            </div>

            <!-- কার্ড ৩: সংখ্যা (আসল সংখ্যা বসাও) -->
            <div class="byvn-card byvn-stat">
                <div class="byvn-number">5,000+</div>
                <div class="byvn-label">Volunteers</div>
                <p>young people have joined our network to serve their communities.</p>
            </div>

            <!-- কার্ড ৪: উদ্ধৃতি -->
            <div class="byvn-card byvn-quote">
                <div class="byvn-quote-inner">
                    <div class="byvn-quote-icon"><i class="fa fa-quote-left"></i></div>
                    <p>Being a volunteer taught me responsibility and the joy of helping people in need.</p>
                    <div class="byvn-quote-by">— Volunteer, BYVN</div>
                </div>
            </div>

            <!-- কার্ড ৫: উদ্ধৃতি -->
            <div class="byvn-card byvn-quote">
                <div class="byvn-quote-inner">
                    <div class="byvn-quote-icon"><i class="fa fa-quote-left"></i></div>
                    <p>When we needed blood urgently, the BYVN volunteers reached us within hours.</p>
                    <div class="byvn-quote-by">— Patient's family</div>
                </div>
            </div>

            <!-- কার্ড ৬: সংখ্যা (আসল সংখ্যা বসাও) -->
            <div class="byvn-card byvn-stat">
                <div class="byvn-number">1,200+</div>
                <div class="byvn-label">Blood Donations</div>
                <p>organised through our volunteers and partner hospitals.</p>
            </div>

            <!-- কার্ড ৭: ছবি -->
            <div class="byvn-card byvn-card-image">
                <img src="{{ asset('uploads/impact_images/impact-2.jpg') }}" alt="Our activities">
            </div>

            <!-- কার্ড ৮: লেখা + বাটন -->
            <div class="byvn-card byvn-card-text">
                <h3>Join our network</h3>
                <p>Be a part of a growing community of young volunteers working for a better Bangladesh.</p>
                <a href="{{ route('frontend.about.us') }}" class="byvn-btn">Learn More</a>
            </div>

        </div>
    </div>
</div>
<!--================= Our Impact Section End Here =================-->