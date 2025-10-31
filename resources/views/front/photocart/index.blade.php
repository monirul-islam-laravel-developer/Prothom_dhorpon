<!doctype html>
<html lang="bn">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>সংবাদ কার্ড — প্রথম দর্পণ</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;700;800&display=swap');

        :root {
            --deep-red:#b70f16;
            --bg-cream:#f6eaea;
        }

        *{box-sizing:border-box;margin:0;padding:0}
        body{
            background:var(--bg-cream);
            font-family:'Noto Sans Bengali',sans-serif;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:5px;
            min-height:100vh;
            flex-direction:column;
        }

        .card{
            width:900px;
            max-width:96vw;
            background:#fff;
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,0.15);
            position:relative;
        }

        /* Top: logo + date + website URL */
        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:4px 8px;
        }

        .site-logo img{
            height:80px;
            width:100px;
        }

        .top-right{
            display:flex;
            flex-direction:column;
            align-items:flex-end;
        }

        .date-top{
            font-weight:700;
            font-size:11px;
            color:#555;
        }

        .site-label{
            font-size:10px;
            font-weight:700;
            color:#fff;
            background:var(--deep-red);
            padding:2px 6px;
            border-radius:10px;
            margin-top:2px;
            text-align:center;
        }

        /* Hero Image */
        .hero img{
            width:90%;
            max-width:800px;
            height:140px;
            object-fit:cover;
            display:block;
            margin:0 auto;
        }

        /* Headline + Button */
        .headline{
            text-align:center;
            padding:4px 8px 6px 8px;
        }
        .headline h1{
            margin:0 0 2px 0;
            color:var(--deep-red);
            font-size:18px;
            line-height:1.1;
            font-weight:800;
        }

        .btn-wrap{display:flex;justify-content:center;margin-top:4px;}
        .btn{
            background:var(--deep-red);
            color:#fff;
            padding:4px 12px;
            border-radius:14px;
            text-decoration:none;
            font-weight:700;
            font-size:12px;
            box-shadow:0 1px 4px rgba(0,0,0,0.2);
            transition:background 0.3s, transform 0.2s;
        }
        .btn:hover{
            background:#a10e13;
            transform:translateY(-1px);
        }

        /* Social Links */
        .social-links{
            display:flex;
            justify-content:center;
            gap:2px;
            padding:4px 0 4px 0;
            font-size:9px;
            font-weight:600;
        }
        .social-links a{
            text-decoration:none;
            color:var(--deep-red);
            display:flex;
            align-items:center;
            gap:2px;
        }
        .social-links a img{
            width:12px;
            height:12px;
        }

        /* Banner */
        .banner-ad{
            width:100%;
            display:flex;
            justify-content:center;
            background:#f6f6f6;
            margin-top:4px;
        }
        .banner-ad img{
            width:90%;
            max-width:800px;
            height:80px;
            object-fit:cover;
        }

        /* Download Button */
        .download-btn{
            margin-top:6px;
            background: linear-gradient(90deg, #b70f16, #c71a1f);
            color:#fff;
            padding:6px 16px;
            border-radius:20px;
            cursor:pointer;
            font-weight:700;
            font-size:12px;
            box-shadow:0 3px 6px rgba(0,0,0,0.2);
            border:none;
            transition:all 0.3s ease;
        }
        .download-btn:hover{
            transform:translateY(-1px);
            box-shadow:0 5px 10px rgba(0,0,0,0.25);
        }

        @media(max-width:700px){
            .hero img{height:180px;}
            .headline h1{font-size:16px;}
            .social-links{gap:3px;}
            .site-logo img{height:25px;}
            .banner-ad img{height:60px;}
        }
    </style>
</head>
<body>

<div id="newsCard" class="card">
    <!-- Top: Logo + Date + Website -->
    <div class="top">
        <div class="site-logo">
            <img src="{{asset($webLogo->desktop_logo)}}" alt="প্রথম দর্পণ লোগো">
        </div>
        <div class="top-right">
            <div class="date-top">৩১ অক্টোবর ২০২৫</div>
            <div class="site-label">prothomdorpan.com</div>
        </div>
    </div>

    <!-- News Image -->
    <div class="hero">
        <img src="{{asset($news->image)}}" alt="news image">
    </div>

    <!-- Headline + Button -->
    <div class="headline">
        <h1>{{$news->title}}</h1>
        <div class="btn-wrap">
            <a class="btn" href="#">বিস্তারিত কমেন্টে</a>
        </div>
    </div>

    <!-- Social links -->
{{--    <div class="social-links">--}}
{{--        <a href="https://facebook.com/username" target="_blank">--}}
{{--            <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"> @username--}}
{{--        </a>--}}
{{--        <a href="https://twitter.com/username" target="_blank">--}}
{{--            <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"> @username--}}
{{--        </a>--}}
{{--        <a href="https://instagram.com/username" target="_blank">--}}
{{--            <img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram"> @username--}}
{{--        </a>--}}
{{--    </div>--}}

    <!-- Banner Ad Full Width -->
    <div class="banner-ad">
        <img src="{{ isset($ads->head_banner) && $ads->head_banner ? asset($ads->head_banner) : asset('front/templateimage/63ad66eeaa3fc.gif') }}" alt="ব্যানার এড">
    </div>
</div>

<!-- Stylish Download Button -->
<button class="download-btn" onclick="downloadCard()">Download Card</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    function downloadCard(){
        const card = document.getElementById('newsCard');
        html2canvas(card, {scale:2}).then(canvas => {
            const link = document.createElement('a');
            link.download = 'news-card.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });
    }
</script>

</body>
</html>
