<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ফটোকার্ড</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@500;700;900&display=swap');

        body {
            font-family: 'Noto Serif Bengali', serif;
            background-color: #f1f4f3;
            margin: 0;
            padding: 0;
        }

        .card {
            max-width: 520px;
            background-color: #e8f1ee;
            border: 1px solid #c7d8d3;
            border-radius: 10px;
            margin: 10px auto;
            box-shadow: 0 3px 10px rgba(0,0,0,0.12);
            text-align: center;
            position: relative;
            padding: 5px;
        }

        .header {
            background-color: #dbe7e2;
            padding: 2px 0;
        }

        .header img {
            height: 34px;
            width: auto;
        }

        /* ✅ Auto-fit image (no crop) */
        .image-section {
            width: 100%;
            background-color: #eef4f2; /* হালকা ব্যাকগ্রাউন্ড */
            margin-bottom: -20px;
            border-bottom: 1px solid #d8e4e0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px 0;
        }

        .image-section img {
            width: 95%;
            height: auto;
            max-height: 270px; /* খুব বেশি লম্বা না হয় */
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
            margin: -20px auto 5px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid #fff;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.25);
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
            margin: 3px auto 5px;
            padding: 3px 12px;
            font-size: 14px;
            border-radius: 18px;
        }

        .banner-ad {
            width: 100%;
            height: 40px;
            overflow: hidden;
            margin-top: 3px;
            border-top: 1px solid #c7d8d3;
            border-bottom: 1px solid #c7d8d3;
            background-color: #fff;
        }

        .banner-ad img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .footer {
            background-color: #109935;
            color: white;
            font-size: 12px;
            padding: 2px 8px;
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
            margin: 8px auto 10px;
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
</head>
<body>
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

        <div class="banner-ad">
            <img src="{{ asset($ads->head_banner) }}" alt="banner ad">
        </div>

        <div class="footer">
            <a href="#">prothomdorpan.com</a>
            <div class="date">
                @php
                    use Carbon\Carbon;
                    $date = Carbon::parse($news->created_at)->timezone('Asia/Dhaka')->locale('bn');
                    $formatted = $date->translatedFormat('d F Y');
                    $english = ['0','1','2','3','4','5','6','7','8','9','AM','PM'];
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
</body>
</html>
