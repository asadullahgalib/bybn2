<!--================= Support Us Section Start Here =================-->
<style>
    .byvn-support-area {
        background-color: #e9f5ec; /* হালকা সবুজ ব্যাকগ্রাউন্ড (News & Events এর মতো) */
        padding: 80px 0;
    }
    
    .byvn-support-content {
        padding-right: 30px;
    }
    
    .byvn-support-title {
        font-size: 36px;
        font-weight: 800;
        color: #0b5a34; /* আপনার থিমের গাঢ় সবুজ রঙ */
        margin-bottom: 25px;
    }
    
    .byvn-support-text {
        font-size: 16px;
        line-height: 1.8;
        color: #444; /* হালকা সবুজের ওপর টেক্সট ভালোভাবে পড়ার জন্য একটু গাঢ় করা হয়েছে */
        margin-bottom: 35px;
    }
    
    /* প্রফেশনাল এবং ক্লিন বাটন */
    .byvn-support-btn {
        display: inline-block;
        background-color: #0b5a34; /* সবুজ বাটন */
        color: #ffffff;
        font-size: 16px;
        font-weight: 700;
        padding: 12px 32px;
        border: 2px solid #0b5a34;
        border-radius: 30px;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .byvn-support-btn:hover {
        background-color: #D2093C; /* মাউস নিলে লাল হবে */
        border-color: #D2093C;
        color: #ffffff;
        text-decoration: none;
    }
    
    /* ছবির ডিজাইন */
    .byvn-support-img-wrap {
        position: relative;
        border-radius: 16px; /* কার্ডের মতো রাউন্ডেড */
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* হালকা শ্যাডো */
    }
    
    .byvn-support-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* মোবাইলের জন্য রেসপন্সিভ */
    @media (max-width: 991px) {
        .byvn-support-area { padding: 60px 0; }
        .byvn-support-content { padding-right: 0; margin-bottom: 40px; text-align: center; }
        .byvn-support-title { font-size: 30px; }
    }
</style>

<div class="byvn-support-area">
    <div class="container">
        <div class="row align-items-center">
            <!-- বাম দিকের টেক্সট -->
            <div class="col-lg-6">
                <div class="byvn-support-content">
                    <h2 class="byvn-support-title">Support Us</h2>
                    <p class="byvn-support-text">
                        By choosing to support BYVN, you help thousands of young people across Bangladesh access vital support through their youth clubs and other community spaces – places where they feel safe and choose to go. Your contribution makes a real difference in building a better tomorrow.
                    </p>
                    <a href="{{ route('frontend.contact.us') ?? '#' }}" class="byvn-support-btn">
                        Support Us
                    </a>
                </div>
            </div>
            
            <!-- ডান দিকের ছবি -->
            <div class="col-lg-6">
                <div class="byvn-support-img-wrap">
                    <!-- এখানে আপনার পছন্দের ছবির পাথ দিবেন -->
                    <img src="{{ asset('uploads/support_images/support-us.jpg') }}" alt="Support BYVN">
                </div>
            </div>
        </div>
    </div>
</div>
<!--================= Support Us Section End Here =================-->