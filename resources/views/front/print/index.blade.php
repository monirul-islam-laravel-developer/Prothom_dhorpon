<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$news->title}}</title>
    <link rel="icon" href="{{asset('/')}}front/templateimage/news 16_n.png">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/line-awesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/fontawesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/primeitworld-style.css" media="all">
    <link rel="stylesheet" type="text/css" href="https://75bangladesh.com/wp-content/themes/primeitworldnewspro/style.css" media="all">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@300;400;600;700;900&display=swap');
    </style>
    <style>
        #News_Print_Page {
            max-width: 1140px;
            background-color: #fff;
            color: #000;
            width: 960px;
            padding: 20px;
            border: 1px solid #e3e3e3;
            margin: 10px auto 38px;
            font-family: 'Noto Serif Bengali', serif;
        }
        .print_page_header {
            margin-bottom: 20px;
            text-align: center;
        }

        /* ✅ লোগোকে মাঝখানে আনা হয়েছে */
        .print_page_header .logo {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }
        .print_page_header .logo img {
            width:600px;
            height:100px;
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
        .print_page_header .date_row .day,
        .print_page_header .date_row .kal {
            width: 150px;
            background: #008200;
            color: #fff;
            font-size: 18px;
            line-height: 34px;
            display: flex;
            justify-content: center;
        }
        .print_page_content .title {
            font-size: 33px;
            font-weight: 600;
            color: #B90101;
            line-height: 1.3;
            margin-bottom: 10px;
            text-align: center;
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
        .print_page_content .content img {
            width: 100%;
            margin-bottom: 15px;
            display: block;
        }
        .print_page_footer .copyright {
            display: flex;
            justify-content: space-between;
        }
        .print_page_footer .copyright p {
            font-size: 20px;
            margin: 0;
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
        .printPage_btn_area .print_btn,
        .printPage_btn_area .Image_btn {
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
        @media print {
            .printPage_btn_area {
                display: none;
            }
        }
    </style>
</head>
<body data-pin-hover="true" class="print-page">

<div id="News_Print_Page" class="container">
    <div class="print_page_header">
        <div class="logo">
            <img src="{{asset($webLogo->desktop_logo)}}" alt="News_16">
            <div class="date_row">
                <div class="day"> <span>{{$currentDay}}</span></div>
                <div class="date">
                    {{$currentDate}}
                </div>

                <div class="kal"><span>{{$news->getBengaliTerm()}}</span></div>
            </div>
        </div>
        </div>
    </div>

    <div class="print_page_content">
        <h1 class="title">{{$news->title}}</h1>
        <div class="single_meta">
            <span class="reporter">{{$news->reporter->name}}, {{$news->reporter->designation}}</span>
            <span class="time">প্রকাশিত: {{$news->created_at->locale('bn')->timezone('Asia/Dhaka')->isoFormat('LLL')}}</span>
        </div>

        <div class="content">
            <div class="thumbnail">
                <img src="{{asset($news->image)}}" alt="">
            </div>
            {!! strip_tags($news->description, '<br><p><ul><li><h1><h2><h3><strong><em><b><i><u>') !!}
        </div>
    </div>

    <div class="print_page_footer">
        <div class="devider"></div>
        <div class="copyright">
            <p></p>
            <p>Developed by : <a target="blank" href="https://monirulbd.com">monirulbd.com</a></p>
        </div>
    </div>
</div>

<div class="printPage_btn_area">
    <a class="print_btn" href="#" onclick="window.print();"><i class="fa-solid fa-print"></i> প্রিন্ট করুন</a>
    <a id="Image_btn" class="Image_btn" href="#"><i class="fa-solid fa-file-arrow-down"></i> ছবি ডাউনলোড করুন</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script>
    $(document).ready(function () {
        var element = $("#News_Print_Page");
        var getCanvas;
        html2canvas(element, {
            onrendered: function (canvas) {
                getCanvas = canvas;
            }
        });

        $("#Image_btn").on('click', function () {
            var imgageData = getCanvas.toDataURL("image/png");
            var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#Image_btn").attr("download", "{{$news->title}}.png").attr("href", newData);
        });
    });
</script>

</body>
</html>
