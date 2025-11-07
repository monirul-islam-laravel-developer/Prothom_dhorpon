<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$news->title}}</title>
    <link rel="icon" href="{{asset($webLogo->fav_icon_logo)}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/line-awesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/fontawesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/primeitworld-style.css" media="all">
    <link rel="stylesheet" type="text/css" href="https://75bangladesh.com/wp-content/themes/primeitworldnewspro/style.css" media="all">
    <style> @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@300;400;600;700;900&display=swap'); </style>
    <style>
        .developed-by {
            font-family: 'Noto Serif Bengali', serif; /* clean Bengali font */
            font-size: 18px;
            font-weight: 500;
            color: #555;
            text-align: center;
            margin-top: 10px;
            line-height: 1.5;
        }

        .developed-by a {
            color: #ff0218;          /* primary highlight color */
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            position: relative;
        }

        .developed-by a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #ff0218;
            transition: width 0.3s;
            position: absolute;
            bottom: -2px;
            left: 0;
        }

        .developed-by a:hover::after {
            width: 100%;             /* underline animation on hover */
        }

        .developed-by a:hover {
            color: #d40014;          /* hover color change */
        }

        #News_Print_Page {
            max-width: 1140px;
            background-color: #fff;
            color: #000;
            width: 960px;
            padding: 20px;
            border: 1px solid #e3e3e3;
            margin: 10px auto 38px;
            font-family: sans-serif;
        }
        .print_page_header {
            margin-bottom: 20px;
        }
        .print_page_header .logo {
            margin: 0 auto 10px; /* centered + bottom margin */
            width: auto;         /* width auto, height নির্ধারণে proportional */
            text-align: center;
        }

        .print_page_header .logo img {
            height: 80px;       /* fixed height */
            width: 500px;         /* width auto to maintain aspect ratio */
            display: inline-block;
        }

        .print_page_header .date_row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .print_page_header .date {
            width: calc(100% - 300px);
            font-size: 18px;
            line-height: 34px;
            background: #ee142f;
            color: #fff;
            display: flex;
            justify-content: center;
        }
        .print_page_header .date_row .day, .print_page_header .date_row .kal {
            width: 150px;
            background: #008200;
            color: #fff;
            font-size: 18px;
            line-height: 34px;
            display: flex;
            justify-content: center;
        }
        .print_page_header .date_row span {
            display: block;
        }
        .print_page_content .title {
            font-size: 33px;
            font-weight: 600;
            color: #B90101;
            line-height: 1.3;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
        }
        .print_page_content .single_meta {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .print_page_content .single_meta span {
            font-size: 20px;
            line-height: 35px;
        }
        .print_page_content .content {
            font-size: 20px;
            column-count: 3;
            text-align: justify;
        }
        .print_page_content .content .thumbnail {
            position: relative;
            top: 7px;
        }
        .print_page_content .content img {
            width: 100%;
            margin-bottom: 15px;
            display: block;
        }
        .print_page_content .content .thumbnail img {
            margin-bottom: 25px;
        }
        .print_page_content .content p {
            margin-bottom: 7px;
        }
        .print_page_footer .copyright {
            display: flex;
            justify-content: space-between;
        }
        .print_page_footer .copyright p {
            font-size: 20px;
            margin: 0;
        }
        .print_page_footer .editorial {
            font-size: 22px;
        }
        .print_page_footer .editorial strong {
            font-weight: 600;
        }
        #News_Print_Page .devider {
            width: 100%;
            height: 1px;
            background: #bbb9b9;
            margin: 15px 0;
        }
        .printPage_btn_area {
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        .printPage_btn_area .print_btn, .printPage_btn_area .Image_btn {
            font-size: 17px;
            padding: 7px 10px 5px 10px;
            background: #ff0218;
            display: inline-block;
            color: #fff;
            min-width: 160px;
        }
        .printPage_btn_area .Image_btn {
            background: green;
        }
        .printPage_btn_area .print_btn i, .printPage_btn_area .Image_btn i {
            margin-right: 6px;
        }
        @media print{
            a[href]:after{
                content:""
            }
            .printPage_btn_area{
                display:none
            }
        }
        @media only screen and (max-width: 991px) {
            .printPage_btn_area .print_btn, .printPage_btn_area .Image_btn {
                font-size: 42px;
                padding: 12px 15px 10px 15px;
                width: 44%;
            }
            .print_page_header .date_row .day, .print_page_header .date_row .kal, .print_page_header .date {
                font-size: 22px;
                line-height: 38px;
            }
        }
    </style>
</head>
<body>
<body data-pin-hover="true" class="print-page">
<div id="News_Print_Page" class="container">
    <div class="print_page_header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset($webLogo->desktop_logo) }}" alt="Website Logo">
            </a>
        </div>
        @php
            // বাংলা দিন ও মাস
            $banglaDays = ['রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার','শনিবার'];
            $banglaMonths = ['জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','অগাস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর'];

            // বাংলা দিন
            $currentDay = $banglaDays[date('w')];

            // বাংলা তারিখ
            $day = date('j');
            $month = $banglaMonths[date('n')-1];
            $year = date('Y');

            // বাংলা ঋতু
            $monthNum = date('n');
            if(in_array($monthNum,[1,2])) { $rit='শীত'; }
            elseif(in_array($monthNum,[3,4])) { $rit='বসন্ত'; }
            elseif(in_array($monthNum,[5,6])) { $rit='গ্রীষ্ম'; }
            elseif(in_array($monthNum,[7,8])) { $rit='বর্ষা'; }
            elseif(in_array($monthNum,[9,10])) { $rit='শরৎ'; }
            else { $rit='হেমন্ত'; }

            // সময়ের বাংলা টার্ম
            $hour = date('H');
            $minute = date('i');
            if($hour>=6 && $hour<12){ $period='সকাল'; }
            elseif($hour>=12 && $hour<15){ $period='দুপুর'; }
            elseif($hour>=15 && $hour<18){ $period='বিকেল'; }
            elseif($hour>=18 && $hour<21){ $period='সন্ধ্যা'; }
            else{ $period='রাত'; }

            $hour12 = $hour % 12;
            if($hour12==0) $hour12=12;

            $currentDate = $day.' '.$month.' '.$year.', '.$period.' '.$hour12.':'.$minute;
        @endphp

        <div class="date_row">
            <div class="day"><span>{{ $currentDay }}</span></div>
            <div class="date">{{ $currentDate }}</div>
            <div class="kal"><span>{{ $rit }}</span></div>
        </div>








    </div>
    <div class="print_page_content">
        <h1 class="title">{{$news->title}}</h1>
        <div class="single_meta">
               <span class="reporter">
{{--                                             <img src="" width="400">--}}

                   {{$news->reporter->name}},{{$news->reporter->area}}  ।।            </span>
            <span class="time"></i> প্রকাশিত: {{$news->created_at->locale('bn')->timezone('Asia/Dhaka')->isoFormat('LLL')}},</span>
            <br><br><br>
        </div>

        <div class="content">
            <div class="thumbnail">
                <img width="1600" height="270" src="{{asset($news->image)}}" alt="" >
            </div>
            @php
                $allowed_tags = ['br','p','ul','li','h1','h2','h3','h4','h5','h6','strong','em','b','i','u','blockquote','hr'];

                // ১. strip_tags এর মতো কিন্তু DOM ব্যবহার করে
                $desc = $news->description;

                // ২. DOMDocument ব্যবহার করে HTML parse করা
                libxml_use_internal_errors(true); // errors suppress
                $doc = new DOMDocument();
                $doc->loadHTML(mb_convert_encoding($desc, 'HTML-ENTITIES', 'UTF-8'));

                // ৩. সব ট্যাগ traverse করে অনুমোদিত ছাড়া বাদ দেওয়া
                $tags = iterator_to_array($doc->getElementsByTagName('*'));
                foreach ($tags as $tag) {
                    if(!in_array($tag->nodeName, $allowed_tags)) {
                        $tag->parentNode->replaceChild($doc->createTextNode($tag->textContent), $tag);
                    }
                }

                // ৪. পরিষ্কার HTML কে string এ রূপান্তর
                $desc = $doc->saveHTML();

                // ৫. লাইনের ভিতরের দুই বা তার বেশি স্পেস → এক স্পেস
                $desc = preg_replace('/[ \t]{2,}/', ' ', $desc);

                // ৬. একাধিক <br> কমানো
                $desc = preg_replace('/(<br\s*\/?>\s*){2,}/i', '<br>', $desc);

                // ৭. খালি <p> সরানো
                $desc = preg_replace('/<p>\s*<\/p>/i', '', $desc);

                // ৮. লাইনের শুরু/শেষের স্পেস দূর করা
                $desc = preg_replace('/^\s+|\s+$/m', '', $desc);

                // ৯. একাধিক নতুন লাইন → এক লাইনে
                $desc = preg_replace('/(\r?\n){2,}/', "\n", $desc);
            @endphp

            {!! $desc !!}






        </div>
    </div>
    <div class="print_page_footer">
        <div class="devider"></div>
        <div class="editorial">
            <p><strong>প্রধান সম্পাদকঃ</strong> {{$editoral->editor}}, <strong>ফোনঃ</strong> {{$editoral->mobile1}}, <strong>ইমেইল:</strong> {{$editoral->email}}</p>


        </div>
        <div class="devider"></div>
        <div class="copyright">
            <p></p>
            <p class="developed-by">
                Developed by : <a href="https://monirulbd.com" target="_blank">monirulbd.com</a>
            </p>

        </div>
    </div>
</div>
<div class="printPage_btn_area">
    <a class="print_btn" href="#" onclick="window.print();"><i class="fa-solid fa-print"></i> প্রিন্ট করুন</a><a id="Image_btn" class="Image_btn" href="#"><i class="fa-solid fa-file-arrow-down"></i> ছবি ডাউনলোড করুন</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const element = document.getElementById("News_Print_Page");
        const btn = document.getElementById("Image_btn");

        btn.addEventListener("click", function(e) {
            e.preventDefault();

            html2canvas(element, {
                allowTaint: true,
                useCORS: true,
                scale: 2 // হাই রেজোলিউশনের জন্য
            }).then(function(canvas) {
                const imgData = canvas.toDataURL("image/png");
                const link = document.createElement('a');
                link.href = imgData;
                link.download = "{{ $news->title }}.png"; // নাম হিসেবে নিউজের শিরোনাম
                link.click();
            });
        });
    });
</script>


</body>
</body>
</html>


