@extends('master.front.master')
@section('title', 'ফটোকার্ড')

@section('body')

    <style>
        .card-container {
            max-width: 520px;
            margin: 20px auto;
            position: relative;
        }

        .card-box {
            background: #fff;
            border: 2px solid #c41021;
            overflow: visible;
            position: relative;
            padding: 10px 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            z-index: 1;
        }

        .green-top-svg {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 60px;
            z-index: 2;
            overflow: visible;
        }

        .green-top-svg svg {
            display: block;
            width: 100%;
            height: 100%;
        }

        .green-top-svg .date {
            position: absolute;
            top: 40%; /* date উপরের দিকে সামঞ্জস্য */
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-weight: 700;
            font-size: 18px;
            font-family: 'Poppins', sans-serif;
            white-space: nowrap;
            text-align: center;
        }

        .red-bottom-svg {
            position: absolute;
            bottom: 0; /* নিচে পুরো লেগে থাকবে */
            left: 0;
            width: 27%;
            height: 27%;
            z-index: 2;
        }

        .red-bottom-svg svg {
            display: block;
            width: 100%;
            height: 100%;
        }

        .logo-area {
            text-align: center;
            position: relative;
            z-index: 2;
            padding: 0 25px;
            transform: translateX(20px);
        }

        .logo-area img {
            height: 40px;
            display: block;
            transform: scale(1.50);
            transition: transform 0.3s ease;
        }

        .main-photo-box {
            padding: 0 25px;
            position: relative;
            z-index: 2;
        }

        .main-photo {
            width: 100%;
            margin-top: 5px;
            max-height: 220px;
            object-fit: cover;
        }

        .main-headline {
            text-align: center;
            margin-top: 5px;
            padding: 0 5px;
            font-size: 24px;
            font-weight: 700;
            line-height: 28px;
            position: relative;
            z-index: 2;
        }

        .main-headline .line-red { color: #FF0000; }
        .main-headline .line-green { color: #28a745; }

        .comment-button {
            display: block;
            margin: 10px auto 0;
            padding: 12px 45px;
            background: #c41021;
            color: #fff;
            font-size: 22px;
            border-radius: 50px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
            align-self: center;
        }

        .comment-button:hover {
            background: #9b0d19;
            transform: translateY(-2px);
        }

        .green-new {
            position: absolute;
            top: 0;
            right: 0;
            width: 7%;
            height: 50%;
            background: #28a745;
            clip-path: polygon(0 100%, 100% 100%, 100% 0, 0 0);
        }

        .card-box p {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            color: #c41021;
            margin-top: 10px;
            letter-spacing: 1px;
            font-family: 'Poppins', sans-serif;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .card-box p::after {
            content: "";
            display: block;
            width: 70px;
            height: 3px;
            background: linear-gradient(90deg, #28a745, #c41021);
            margin: 8px auto 0;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .card-box p:hover {
            color: #28a745;
            transform: scale(1.1);
        }

        .card-box p:hover::after {
            width: 100px;
            background: linear-gradient(90deg, #c41021, #28a745);
        }

        .download-button {
            display: inline-block;
            padding: 12px 40px;
            background: linear-gradient(135deg, #28a745, #c41021);
            color: #fff;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            margin-top: 15px;
        }

        .download-button:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #c41021, #28a745);
        }

        .banner-ad { width: 100%; margin: 0; position: relative; z-index: 1; overflow: hidden; }

        .banner-ad img { width: 100%; display: block; border-radius: 0 0 20px 20px; margin: 0; }

        .brand-logo {
            position: relative;
            margin: -22px auto 6px;
            width: 52px; height: 52px;
            border-radius: 50%;
            border: 2px solid #fff;
            background-color: #fff;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            overflow: hidden;
            z-index: 10;
        }

        .brand-logo img { width: 100%; height: 100%; object-fit: cover; }

    </style>

    <div class="card-container" id="card-to-download">

        <div class="card-box">

            <div class="red-bottom-svg">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="0,0 0,100 100,100" fill="#c41021"/>
                </svg>
            </div>

            <div class="green-top-svg">
                <svg width="100%" height="60px" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="0,0 100,0 100,100 20,100" fill="#28a745"/>
                </svg>
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

            <div class="green-new"></div>

            <div class="logo-area">
                <img src="{{ asset($webLogo->desktop_logo) }}">
            </div>

            <div class="main-photo-box">
                <img src="{{ asset($news->image) }}" class="main-photo" alt="">
            </div>
            <div class="brand-logo">
                <img src="{{ asset($webLogo->fav_icon_logo) }}" alt="brand logo">
            </div>

            @php
                $words = explode(' ', $news->title);
                $mid = ceil(count($words)/2);
                $first_half = implode(' ', array_slice($words, 0, $mid));
                $second_half = implode(' ', array_slice($words, $mid));
            @endphp
            <h2 class="main-headline">
                <span class="line-red">{{ $first_half }}</span><br>
                <span class="line-green">{{ $second_half }}</span>
            </h2>

            <button class="comment-button">বিস্তারিত কমেন্ট</button>
            <p>prothomdorpan.com</p>
        </div>

        @if(!empty($ads->news_pics_under_ads))
            <div class="banner-ad">
                <img src="{{ asset($ads->news_pics_under_ads) }}" alt="banner ad">
            </div>
        @endif
    </div>

    <div style="text-align: center;">
        <button id="download-card" class="download-button">Download Card</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        document.getElementById('download-card').addEventListener('click', function() {
            const card = document.getElementById('card-to-download');
            html2canvas(card, {scale: 3, useCORS: true, allowTaint: true}).then(canvas => {
                const link = document.createElement('a');
                link.href = canvas.toDataURL('image/png');
                link.download = 'card.png';
                link.click();
            });
        });
    </script>

@endsection
