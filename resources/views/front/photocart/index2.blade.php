@extends('master.front.master')

@section('title', 'ফটোকার্ড')

<style>
    body{
        margin: 0;
        background: #111;
        font-family: Arial, sans-serif;
    }

    /* Main Card */
    .news-card{
        width: 520px;
        margin: 40px auto;
        background: linear-gradient(to bottom, #8b0000, #3b0000);
        border: 4px solid #7a0000;
        color: #fff;
        position: relative;
    }

    /* Image */
    .news-image img{
        width: 100%;
        display: block;
    }

    /* Brand Logo */
    .brand-logo{
        position: relative;
        margin: -26px auto 4px;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        border: 2px solid #fff;
        background-color: #fff;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        overflow: hidden;
        z-index: 10;
    }
    .brand-logo img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Content */
    .news-content{
        padding: 12px 20px;
        text-align: center;
        width: 100%;
    }
    .main-title{
        font-size: 22px;
        line-height: 1.2;
        font-weight: bold;
        margin: 0;
        word-wrap: break-word;  /* text will wrap if too long */
        word-break: break-word;
        display: block;
        width: 100%;
    }

    /* Banner Ad */
    .banner-ad{
        width: 100%;
        overflow: hidden;
    }
    .banner-ad img{
        width: 100%;
        display: block;
    }

    /* Footer - single row */
    .news-footer{
        background: #8b0000;
        padding: 10px 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
    }

    .comment-cta{
        background: #FFA500;
        color: #fff;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: bold;
        white-space: nowrap;
        box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    }

    /* Download Button */
    #downloadBtn{
        padding: 10px 20px;
        font-size: 16px;
        background: #FFA500;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        margin: 20px auto;
        display: block;
    }

    @media(max-width:768px){
        .news-card{
            width: 95%;
        }
        .news-footer{
            flex-wrap: wrap;
            justify-content: center;
            gap: 4px;
        }
    }
</style>

@section('body')

    <div class="news-card" id="card">

        <div class="news-image">
            <img src="{{ asset($news->image) }}" alt="News Image">
        </div>

        <div class="brand-logo">
            <img src="{{ asset($webLogo->fav_icon_logo) }}" alt="Brand Logo">
        </div>

        <div class="news-content">
            <div class="main-title">
                {{ $news->title }}
            </div>
        </div>

        @php
            $headBannerCategories = [2,3,5,6,7,8];
            $newsHeadAdsCategories = [10,11,12,13,14,15,16,17,18,19,20,21,23];
        @endphp

        @if(isset($news->category_id) && in_array($news->category_id, $headBannerCategories) && !empty($ads->head_banner))
            <div class="banner-ad">
                <img src="{{ asset($ads->head_banner) }}">
            </div>
        @elseif(isset($news->category_id) && in_array($news->category_id, $newsHeadAdsCategories) && !empty($ads->news_head_ads))
            <div class="banner-ad">
                <img src="{{ asset($ads->news_head_ads) }}">
            </div>
        @elseif(!empty($ads->news_pics_under_ads))
            <div class="banner-ad">
                <img src="{{ asset($ads->news_pics_under_ads) }}">
            </div>
        @endif

        <div class="news-footer">
            <div>
                @php
                    use Carbon\Carbon;
                    $date = Carbon::parse($news->created_at)
                                ->timezone('Asia/Dhaka')
                                ->locale('bn');
                    $formatted = $date->translatedFormat('d F Y');
                    $english = ['0','1','2','3','4','5','6','7','8','9'];
                    $bangla  = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
                    echo str_replace($english, $bangla, $formatted);
                @endphp
            </div>

            <div class="comment-cta">
                বিস্তারিত কমেন্টে
            </div>

            <div>
                <strong>www.prothomdorpan.com</strong>
            </div>
        </div>

    </div>

    <button id="downloadBtn">Download HD</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
        document.getElementById('downloadBtn').addEventListener('click', function () {

            const card = document.getElementById('card');

            html2canvas(card, {
                scale: 3,
                useCORS: true,
                allowTaint: true,
                backgroundColor: null
            }).then(canvas => {

                const finalWidth = 1050;
                const finalHeight = canvas.height * (finalWidth / canvas.width);

                const finalCanvas = document.createElement('canvas');
                finalCanvas.width = finalWidth;
                finalCanvas.height = finalHeight;

                const ctx = finalCanvas.getContext('2d');

                ctx.fillStyle = '#8b0000';
                ctx.fillRect(0, 0, finalWidth, finalHeight);

                ctx.drawImage(canvas, 0, 0, finalWidth, finalHeight);

                const borderWidth = 8;
                ctx.lineWidth = borderWidth;
                ctx.strokeStyle = '#7a0000';
                ctx.strokeRect(0, 0, finalWidth, finalHeight);

                const link = document.createElement('a');
                link.download = '{{ Str::slug($news->title) }}.png';
                link.href = finalCanvas.toDataURL('image/png', 1.0);
                link.click();

            });

        });
    </script>

@endsection
