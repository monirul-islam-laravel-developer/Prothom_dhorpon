@extends('master.front.master')
@section('title')
    ফটোকার্ড
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@500;700;900&display=swap');

    body {
        font-family: 'Noto Serif Bengali', serif;
        background: linear-gradient(135deg, #d0f0e0 0%, #f0f9f4 50%, #bdeed2 100%);
        margin: 0;
        padding: 0;
    }

    .card {
        max-width: 520px;
        background: linear-gradient(180deg, #ffffff 0%, #e6f3ef 100%);
        border-radius: 12px;
        margin: 10px auto;
        padding: 6px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        text-align: center;
        position: relative;
    }

    .header {
        background: linear-gradient(90deg, #d9f0e5, #f0faf7);
        padding: 4px 0;
    }

    .header img {
        height: 34px;
        width: auto;
    }

    .image-section {
        width: 100%;
        background: linear-gradient(180deg, #f0faf7, #d9f0e5);
        margin-bottom: 4px;
        border-bottom: 1px solid #d0e5db;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4px 0;
        border-radius: 6px;
    }

    .image-section img {
        width: 95%;
        height: auto;
        max-height: 270px;
        object-fit: contain;
        display: block;
    }

    @media (max-width: 480px) {
        .image-section img {
            max-height: 220px;
        }
    }

    .brand-logo {
        position: relative;
        margin: -22px auto 6px;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        border: 2px solid #fff;
        background-color: #fff;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        overflow: hidden;
        z-index: 10;
    }

    .brand-logo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .content {
        padding: 8px 10px;
        color: #141202;
        line-height: 1.4;
        font-size: 18px;
        font-weight: 900;
        border-bottom: 2px solid #c40000;
        display: inline-block;
        margin: 4px auto 6px;
    }

    .content::before {
        content: "📰 ";
        color: #b00000;
        font-size: 16px;
    }

    .highlight {
        display: inline-block;
        background: linear-gradient(90deg, #c40000, #e63b3b);
        color: white;
        font-weight: bold;
        margin: 4px auto 6px;
        padding: 5px 14px;
        font-size: 14px;
        border-radius: 20px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    .banner-ad {
        width: 100%;
        height: 40px;
        overflow: hidden;
        margin-top: 4px;
        border-top: 1px solid #d1e1dc;
        border-bottom: 1px solid #d1e1dc;
        background: #ffffff;
    }

    .banner-ad img {
        width: 100%;
        height: 100%;
    }

    .footer {
        background: linear-gradient(90deg, #0fa835, #128a2e);
        color: white;
        font-size: 12px;
        padding: 3px 8px;
        display: flex;
        justify-content: space-between;
    }

    .footer a {
        color: #fff;
        text-decoration: none;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    .download-btn {
        display: block;
        margin: 6px auto 10px;
        background-color: #c40000;
        color: #fff;
        border: none;
        padding: 6px 15px;
        font-size: 14px;
        border-radius: 25px;
        cursor: pointer;
    }

    .download-btn:hover {
        background-color: #e63b3b;
    }
</style>

@section('body')

    <div id="card-wrapper">
        <div class="card" id="photo-card">
            <div class="header">
                <img src="{{ asset($webLogo->desktop_logo) }}" alt="logo">
            </div>

            <div class="image-section">
                <img src="{{ asset($news->image) }}" alt="news image">
            </div>

            <div class="brand-logo">
                <img src="{{ asset($webLogo->fav_icon_logo) }}" alt="brand logo">
            </div>

            <div class="content">
                {{ $news->title }}
            </div>

            <div class="highlight">বিস্তারিত কমেন্টে</div>

            @if(!empty($ads->news_pics_under_ads))
                <div class="banner-ad">
                    <img src="{{ asset($ads->news_pics_under_ads) }}" alt="banner ad">
                </div>
            @endif

            <div class="footer">
                <a href="#">prothomdorpan.com</a>
                <div class="date">
                    @php
                        use Carbon\Carbon;
                        $date = Carbon::parse($news->created_at)->timezone('Asia/Dhaka')->locale('bn');
                        $formatted = $date->translatedFormat('d F Y');
                        $english = ['0','1','2','3','4','5','6','7','৮','৯','AM','PM'];
                        $bangla  = ['০','১','২','৩','৪','৫','৬','৭','৮','৯','পূর্বাহ্ণ','অপরাহ্ণ'];
                        echo str_replace($english, $bangla, $formatted);
                    @endphp
                </div>
            </div>
        </div>

        <button class="download-btn" onclick="downloadCard()">ডাউনলোড করুন</button>
    </div>

    <script>
        function downloadCard() {
            const card = document.getElementById("photo-card");
            html2canvas(card, { scale: 3, useCORS: true }).then(canvas => {
                const link = document.createElement("a");
                link.download = "photo-card.png";
                link.href = canvas.toDataURL("image/png");
                link.click();
            });
        }
    </script>

@endsection
