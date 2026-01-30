@extends('master.front.master')
@section('title')
    {{$webLogo->title}}
@endsection
{{-- Blade Section --}}
@section('og:title')
    {{ $webLogo->title ?? config('app.name') }}
@endsection
@section('keyword')
    প্রথম দর্পন,পথম দর্পণ,প্রথম দোর্পণ,প্রথম দর্স্পণ,প্রথম দর্পাণ,প্রথম দরফন,প্রতম দোপণ,prthom dorpon,prthm dorpon,prthom dorpn,prthom dorppon,prothpm dorpon,patham dorpon,pathom darpan,prothom dorpan,প্রথম দর্পণ, বাংলা সংবাদ, অনলাইন নিউজ, বাংলাদেশ খবর, ব্রেকিং নিউজ, সর্বশেষ খবর, আজকের সংবাদ, জাতীয় খবর, আন্তর্জাতিক খবর, রাজনীতি সংবাদ, অর্থনীতি সংবাদ, খেলাধুলা খবর, বিনোদন খবর, প্রযুক্তি সংবাদ
    দুর্নীতি খবর, পুলিশ সংবাদ, আদালত সংবাদ, দুর্ঘটনা খবর, আবহাওয়া খবর, শিক্ষা সংবাদ, স্বাস্থ্য সংবাদ, কৃষি সংবাদ, লাইফস্টাইল খবর, ধর্মীয় খবর, পরামর্শ, রিভিউ নিউজ, মতামত কলাম
    বাংলাদেশ লাইভ নিউজ, ভাইরাল নিউজ, ব্রেকিং নিউজ আপডেট, অনলাইন নিউজ ২৪, তাজা খবর, বাংলা নিউজ আজ, দ্রুত খবর, বাংলা অনলাইন মিডিয়া, সংবাদ আপডেট,
    prothomdorpan.com,prothomdorpan,prothom dorpan
@endsection

@section('og:description')
    {{ $webLogo->description ?? 'সর্বশেষ খবর, বিশ্লেষণ এবং প্রতিবেদন পড়ুন আমাদের পোর্টালে।' }}
@endsection

@section('og:image')
    {{ asset(($webLogo->lazyload_logo ?? 'frontend/images/og-default.jpg') . '?v=' . time()) }}
@endsection

@section('body')

    <style>
        .ad-box {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 6px 0;
        }

        .ad-box img {
            width: 95%;
            height: 190px;
            object-fit: contain;
            background: #fff;
            border-radius: 4px;
            padding: 4px;
            box-shadow: 0 0 4px rgba(0,0,0,0.12);
        }

        /* Mobile Responsive Fix */
        @media (max-width: 767px) {
            .ad-box img {
                width: 100%;
                height: auto;  /* Auto so no extra gap */
                padding: 2px;  /* Less padding in mobile */
                box-shadow: none; /* Optional: remove shadow on small screens */
            }
            .ad-box {
                margin: 4px 0;
            }
        }
    </style>

    @if(!empty($ads->home_shironam_ads_1))
        <div class="ad-box">
            <img src="{{ asset($ads->home_shironam_ads_1) }}" alt="Banner Ad">
        </div>
    @else
        <div class="ad-box">
            <img src="{{ asset('front/templateimage/63ad66eeaa3fc.gif') }}" alt="Default Banner Ad">
        </div>
    @endif


    <section class="themesBazar_section_one">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="themesbazar_led_active owl-carousel">


                                @foreach($leadnewses5 as $leadnews)
                                <div class="secOne_newsContent">
                                    <div class="sec-one-image">
                                        <a href="{{route('news-detail',[$leadnews->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($leadnews->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="">{{$leadnews->title}}</a>

                                        <h6 class="sec-small-cat">
                                            <a href="#">  {{ \Carbon\Carbon::parse($leadnews->created_at)->locale('bn')->bnDiffForHumans() }}
                                            </a>
                                        </h6>





                                        <h1 class="sec-one-title">
                                            <a href="{{route('news-detail',[$leadnews->id])}}">{{$leadnews->title}}</a>
                                        </h1>
                                    </div>
                                </div>
                                @endforeach






                            </div>


                            <!-- section one sub content -->
                            <div class="sec-one-item">
                                <div class="row">

                                    @foreach($subleadnews2 as $subleadnews_2)
                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="sec-one-wrpp">
                                            <div class="secOne-news">
                                                <div class="secOne-sub-image">
                                                    <a href="{{route('news-detail',[$subleadnews_2->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($subleadnews_2->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$subleadnews_2->title}}"></a>




                                                </div>
                                                <h4 class="secOne-title2">
                                                    <a href="{{route('news-detail',[$subleadnews_2->id])}}">{{$subleadnews_2->title}}</a>
                                                </h4>
                                            </div>

                                            <h6 class="cat-meta">
                                                <a href="#"> <i class="lar la-newspaper"></i>  {{ \Carbon\Carbon::parse($subleadnews_2->created_at)->locale('bn')->bnDiffForHumans() }}
                                                </a>
                                            </h6>

                                        </div>
                                    </div>
                                    @endforeach




                                </div>






                            </div>



                        </div>
                        <div class="col-lg-5 col-md-5">

                            @foreach($home5newses as $home5news)
                            <div class="secOne-smallItem">
                                <div class="secOne-smallImg">
                                    <a href="{{route('news-detail',[$home5news->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($home5news->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$home5news->title}}"></a>

                                    <div class="sec-small-cat1">
                                        <a href="#">
                                            {{ \Carbon\Carbon::parse($leadnews->created_at)->locale('bn')->bnDiffForHumans() }}
                                        </a>
                                    </div>




                                    <h5 class="secOne_smallTitle">
                                        <a href="{{route('news-detail',[$home5news->id])}}">{{$home5news->title}} </a>
                                    </h5>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="sec-one-item2">
                        <div class="row">
                            @foreach($home6newses as $home6news)
                            <div class="themesBazar-3 themesBazar-m2">
                                <div class="sec-one-wrpp2">
                                    <div class="secOne-news">
                                        <div class="secOne-image2">
                                            <a href="{{ route('news-detail', [$home6news->id]) }}">
                                                <img class="lazyload" src="{{ asset($webLogo->lazyload_logo) }}" data-src="{{ asset($home6news->image) }}" alt="{{ $home6news->title }}" title="{{ $home6news->title }}">
                                            </a>



                                        </div>
                                        <h4 class="secOne-title2">
                                            <a href="{{route('news-detail',[$home6news->id])}}">{{$home6news->title}}</a>
                                        </h4>
                                    </div>

                                    <div class="cat-meta">
                                        <a href="#"> <i class="lar la-newspaper"></i>  {{ \Carbon\Carbon::parse($leadnews->created_at)->locale('bn')->bnDiffForHumans() }}
                                        </a>
                                    </div>

                                </div>

                            </div>
                            @endforeach






                        </div>



                    </div>

                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="archive-title">
                        ফেসবুকে আমরা
                    </div>

                    <div class="facebook-content">



                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/profile.php?id=61582862455071&amp;tabs=time&amp;width=280&amp;height=120&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=334182264340964"
                            width="280" height="120" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>




                    <div class="archive-title">

                        টুইটারে আমরা

                    </div>

                    <div class="facebook-content">

                        <a class="twitter-timeline" data-width="300" data-height="250" data-dnt="true" data-theme="light" href="https://www.twitter.com/themesbazar"> </a> <script async src="../../platform.twitter.com/widgets.js" charset="utf-8"></script>

                    </div>





{{--                    <div class="archive-title">--}}
{{--                        পুরাতন সংবাদ--}}
{{--                    </div>--}}

{{--                    <form action="https://themebazar.xyz/laraflash/news/calender/post" method="get" class="date_content">--}}
{{--                        <input type="hidden" name="_token" value="npv0BOp6m8gjl8YmLleA8kPNIXTsqhE6TJsDtfst">                        <div class="last-date">--}}

{{--                            <select name="day" id="day">--}}
{{--                                <option value="day"> দিন </option>--}}
{{--                                <option value="01"> 01 </option>--}}
{{--                                <option value="02"> 02 </option>--}}
{{--                                <option value="03"> 03 </option>--}}
{{--                                <option value="04"> 04 </option>--}}
{{--                                <option value="05"> 05 </option>--}}
{{--                                <option value="06"> 06 </option>--}}
{{--                                <option value="07"> 07 </option>--}}
{{--                                <option value="08"> 08 </option>--}}
{{--                                <option value="09"> 09 </option>--}}
{{--                                <option value="10"> 10 </option>--}}
{{--                                <option value="11"> 11 </option>--}}
{{--                                <option value="12"> 12 </option>--}}
{{--                                <option value="13"> 13 </option>--}}
{{--                                <option value="14"> 14 </option>--}}
{{--                                <option value="15"> 15 </option>--}}
{{--                                <option value="16"> 16 </option>--}}
{{--                                <option value="17"> 17 </option>--}}
{{--                                <option value="18"> 18 </option>--}}
{{--                                <option value="19"> 19 </option>--}}
{{--                                <option value="20"> 20 </option>--}}
{{--                                <option value="21"> 21 </option>--}}
{{--                                <option value="22"> 22 </option>--}}
{{--                                <option value="23"> 23 </option>--}}
{{--                                <option value="24"> 24 </option>--}}
{{--                                <option value="25"> 25 </option>--}}
{{--                                <option value="26"> 26 </option>--}}
{{--                                <option value="27"> 27 </option>--}}
{{--                                <option value="28"> 28 </option>--}}
{{--                                <option value="29"> 29 </option>--}}
{{--                                <option value="30"> 30 </option>--}}
{{--                                <option value="31"> 31 </option>--}}
{{--                            </select>--}}

{{--                        </div>--}}

{{--                        <div class="last-date">--}}

{{--                            <select name="month" id="month">--}}

{{--                                <option value="month"> মাস </option>--}}
{{--                                <option value="01"> 01 </option>--}}
{{--                                <option value="02"> 02 </option>--}}
{{--                                <option value="03"> 03 </option>--}}
{{--                                <option value="04"> 04 </option>--}}
{{--                                <option value="05"> 05 </option>--}}
{{--                                <option value="06"> 06 </option>--}}
{{--                                <option value="07"> 07 </option>--}}
{{--                                <option value="08"> 08 </option>--}}
{{--                                <option value="09"> 09 </option>--}}
{{--                                <option value="10"> 10 </option>--}}
{{--                                <option value="11"> 11 </option>--}}
{{--                                <option value="12"> 12 </option>--}}
{{--                            </select>--}}

{{--                        </div>--}}





{{--                        <div class="last-date">--}}

{{--                            <select name="year" id="year">--}}

{{--                                <option value="year"> বছর </option>--}}
{{--                                <option value="2023"> 2023 </option>--}}
{{--                                <option value="2025"> 2024 </option>--}}
{{--                                <option value="2026"> 2025 </option>--}}
{{--                                <option value="2026"> 2026 </option>--}}
{{--                                <option value="2027"> 2027 </option>--}}
{{--                                <option value="2028"> 2028 </option>--}}
{{--                                <option value="2029"> 2029 </option>--}}
{{--                                <option value="2030"> 2030 </option>--}}

{{--                            </select>--}}

{{--                        </div>--}}



{{--                        <div class="last-date">--}}

{{--                            <input type="submit" value="খুজুন">--}}

{{--                        </div>--}}





{{--                    </form>--}}

                    <div class="recentPopular">
                        <ul class="nav nav-pills" id="recentPopular-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" id="recent-tab" data-bs-toggle="pill" data-bs-target="#recent" role="tab" aria-controls="recent" aria-selected="false"> সর্বশেষ সংবাদ </div>
                            </li>


                            <li class="nav-item" role="presentation">
                                <div class="nav-link" id="popular-tab" data-bs-toggle="pill" data-bs-target="#popular" role="tab" aria-controls="popular" aria-selected="false"> আলোচিত সংবাদ  </div>
                            </li>

                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane active show  fade" id="recent" role="tabpanel"     aria-labelledby="recent">
                            <div class="news-titletab">
                                @foreach($latestnews_20 as $latest1)
                                    <div class="tab-image tab-border">

                                        <a href="{{route('news-detail',[$latest1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($latest1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$latest1->title}}"></a>

                                        <a href="#" class="video-icon3">  </a>


                                        <h4 class="tab_hadding"><a href="{{route('news-detail',[$latest1->id])}}">{{$latest1->title}}</a></h4>

                                    </div>
                                @endforeach




                            </div>

                        </div>


                        <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular">
                            <div class="news-titletab">


                                @foreach($popularNews20 as $popularnews20_single)
                                    <div class="tab-image tab-border">
                                        <a href="{{route('news-detail',[$popularnews20_single->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($popularnews20_single->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$popularnews20_single->title}}"></a>

                                        <a href="#" class="video-icon3">  </a>


                                        <h4 class="tab_hadding"><a href="{{route('news-detail',[$popularnews20_single->id])}}">{{$popularnews20_single->title}}</a></h4>

                                    </div>
                                @endforeach


                            </div>

                        </div>



                    </div>


                    <div class="secOne-Rsitebar">

                        <div class="side-ad-box">
                            @if(!empty($ads->home_box1_ads))
                                <img src="{{ asset($ads->home_box1_ads) }}" alt="Sidebar Ad">
                            @else
                                <img src="{{ asset('front/templateimage/63ad66eeaa3fc.gif') }}" alt="Default Ad">
                            @endif
                        </div>

                        <style>
                            .side-ad-box {
                                width: 100%;
                                display: flex;
                                justify-content: center;
                                margin-bottom: 5px;
                            }
                            .side-ad-box img {
                                width: 100%;
                                height:auto; /* Sidebar ad height */
                                object-fit: contain;
                                background: #fff;
                                border-radius: 6px;
                                padding: 6px;
                                box-shadow: 0 1px 5px rgba(0,0,0,0.18);
                            }

                            /* Mobile Responsive */
                            @media (max-width: 767px) {
                                .side-ad-box img {
                                    height: auto;
                                    padding: 4px;
                                    box-shadow: none;
                                }
                            }
                        </style>

                    </div>



                </div>





            </div>

    </section>

    <!-- Add section start  -->
    <div class="secOne-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="secOne-add">

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="secOne-add">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Add section End  -->

    <!--=======================
                              Section-two-Start
                        ==========================-->
    <section class="section-two">
        <div class="container">
            <div class="secTwo-color">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="themesBazar_cat6">
                            <ul class="nav nav-pills" id="categori-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <!-- Click korle specific news category page e jabe -->
                                    <a href="{{ route('category-news',[$jatiyo->id,$jatiyo->slug]) }}" class="nav-link active">
                                        {{$jatiyo->name}}
                                    </a>
                                </li>
                                <span class="themeBazar6"></span>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane active show  fade" id="Info-tabs1" role="tabpanel" aria-labelledby="categori-tab1 ">

                                <div class="row">
                                    @foreach($jatiyonewses as $jatiyonews)
                                    <div class="themesBazar-4 themesBazar-m2">
                                        <div class="sec-two-wrpp">
                                            <div class="section-two-image">
                                                <a href="{{route('news-detail',[$jatiyonews->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($jatiyonews->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$jatiyonews->title}}"></a>

                                                <a href="#" class="video-icon3">  </a>
                                            </div>

                                            <h5 class="sec-two-title">
                                                <a href="{{route('news-detail',[$jatiyonews->id])}}">{{$jatiyonews->title}}</a>
                                            </h5>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        /* সেকশন ব্যাকগ্রাউন্ড সাদা রাখছি */
        .section-two {
            background-color: #ffffff;
        }

        /* ভেতরের wrapper যদি আলাদা bg দেয় */
        .secTwo-color {
            background-color: #ffffff;
        }
    </style>

    <section class="section-two">
        <div class="container">
            <div class="secTwo-color">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="themesBazar_cat6">
                            <ul class="nav nav-pills" id="categori-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="categori-tab1" data-bs-toggle="pill"
                                         data-bs-target="#Info-tabs1" role="tab" aria-controls="Info-tabs1"
                                         aria-selected="false">
                                        <a href="{{ route('category-news', [$rajniti->id, $rajniti->slug]) }}">
                                            {{ $rajniti->name }}
                                        </a>
                                    </div>
                                </li>
                                <span class="themeBazar6"></span>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane active show fade" id="Info-tabs1" role="tabpanel"
                                 aria-labelledby="categori-tab1">
                                <div class="row">
                                    @foreach($rajnitinewses as $rajnitinews)
                                        <div class="themesBazar-4 themesBazar-m2">
                                            <div class="sec-two-wrpp">
                                                <div class="section-two-image">
                                                    <a href="{{ route('news-detail', [$rajnitinews->id, $rajnitinews->slug]) }}">
                                                        <img class="lazyload" src="{{ asset($webLogo->lazyload_logo) }}"
                                                             data-src="{{ asset($rajnitinews->image) }}"
                                                             alt="{{ $rajnitinews->title }}"
                                                             title="{{ $rajnitinews->title }}">
                                                    </a>
                                                    <a href="#" class="video-icon3"></a>
                                                </div>
                                                <h5 class="sec-two-title">
                                                    <a href="{{ route('news-detail', [$rajnitinews->id]) }}">
                                                        {{$rajnitinews->title}}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-two">
        <div class="container">
            <div class="secTwo-color">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="themesBazar_cat6">
                            <ul class="nav nav-pills" id="categori-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <!-- Click korle antorjarrtik category page e jabe -->
                                    <a href="{{ route('category-news',[$antorjarrtik->id,$antorjarrtik->slug]) }}" class="nav-link active">
                                        {{$antorjarrtik->name}}
                                    </a>
                                </li>
                                <span class="themeBazar6"></span>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane active show  fade" id="Info-tabs1" role="tabpanel" aria-labelledby="categori-tab1 ">

                                <div class="row">
                                    @foreach($antarjarrtiknewses as $antarjarrtiknews)
                                        <div class="themesBazar-4 themesBazar-m2">
                                            <div class="sec-two-wrpp">
                                                <div class="section-two-image">
                                                    <a href="{{route('news-detail',[$antarjarrtiknews->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($antarjarrtiknews->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$antarjarrtiknews->title}}"></a>

                                                    <a href="#" class="video-icon3">  </a>
                                                </div>

                                                <h5 class="sec-two-title">
                                                    <a href="{{route('news-detail',[$antarjarrtiknews->id])}}">{{$antarjarrtiknews->title}}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="section-two">
        <div class="container">
            <div class="secTwo-color">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="themesBazar_cat6">
                            <ul class="nav nav-pills" id="categori-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <!-- Click korle kheladhula category page e jabe -->
                                    <a href="{{ route('category-news',[$kheladhula->id,$kheladhula->slug]) }}" class="nav-link active">
                                        {{$kheladhula->name}}
                                    </a>
                                </li>
                                <span class="themeBazar6"></span>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane active show  fade" id="Info-tabs1" role="tabpanel" aria-labelledby="categori-tab1 ">

                                <div class="row">
                                    @foreach($kheladhulanewses as $kheladhulanews)
                                        <div class="themesBazar-4 themesBazar-m2">
                                            <div class="sec-two-wrpp">
                                                <div class="section-two-image">
                                                    <a href="{{route('news-detail',[$kheladhulanews->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($kheladhulanews->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$kheladhulanews->title}}"></a>

                                                    <a href="#" class="video-icon3">  </a>
                                                </div>

                                                <h5 class="sec-two-title">
                                                    <a href="{{route('news-detail',[$kheladhulanews->id])}}">{{$kheladhulanews->title}}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=======================
                                           Section-two-End
                                     ==========================-->
    <div class="add-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="add-image">


                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--=======================
                                           Section-three-Start
                                     ==========================-->
    <section class="section-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h2 class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$saradesh->id,$saradesh->slug])}}">{{$saradesh->name}}</a></span>
                        <span2><a href="{{route('category-news',[$saradesh->id,$saradesh->slug])}}"> আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </h2>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">



                            <div class="secThree-bg">
                                <div class="sec-theee-image">
                                    <a href="{{route('news-detail',[$saradeshnews1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($saradeshnews1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$saradeshnews1->title}}"></a>

                                </div>
                                <h4 class="secThree-title">
                                    <a href="{{route('news-detail',[$saradeshnews1->id])}}">{{$saradeshnews1->title}} </a>
                                </h4>
                            </div>

                            <div class="row">

                                @foreach($saradeshnews2 as $saradeshnews)
                                <div class="themesBazar-2 themesBazar-m2">
                                    <div class="secThree-wrpp">
                                        <div class="sec-theee-image2">
                                            <a href="{{route('news-detail',[$saradeshnews->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($saradeshnews->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$saradeshnews->title}}"></a>

                                            <a href="#" class="video-icon3">  </a>

                                        </div>
                                        <h4 class="secThree-title2">
                                            <a href="{{route('news-detail',[$saradeshnews->id])}}">{{$saradeshnews->title}} </a>
                                        </h4>
                                    </div>

                                </div>
                                @endforeach



                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="bg2">

                                @foreach($saradeshnews5 as $news5)
                                <div class="secThree-smallItem">
                                    <div class="secThree-smallImg">
                                        <a href="{{route('news-detail',[$news5->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($news5->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$news5->title}}"></a>

                                        <a href="#" class="video-icon3">  </a>


                                        <h5 class="secOne_smallTitle">
                                            <a href="{{route('news-detail',[$news5->id])}}">{{$news5->title}} </a>
                                        </h5>
                                    </div>
                                </div>
                                @endforeach



                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4 col-md-4">
                    <h4 class="map-title">
                        এক নজরে বাংলাদেশ
                    </h4>




                    <div class="map-area" style="width:100%; background: #eff3f4;  padding:2px 50px">




                      @include('front.include.map')



                        <!-- <div class="search-field">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="sel1">
                                <option selected="selected">বিভাগ</option>
                                <option>ঢাকা</option>
                                <option>চট্টগ্রাম</option>
                                <option> খুলনা</option>
                                <option> সিলেট</option>
                                <option> রাজশাহী</option>
                                <option> রংপুর</option>
                                <option> বরিশাল</option>
                                <option>ময়মনসিংহ</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="sel1">
                                <option selected="selected">জেলা</option>
                                <!--<option>2</option>-->
                        <!--<option>3</option>-->
                        <!--<option>4</option>-->
                        <!--</select>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <button type="submit" class="search-btn">অনুসন্ধান করুন</button>
                        </div>
                    </div>
                </div> -->

                    </div>




                    <script src="public/frontend/assets/js/googlejquery.min.js"></script>

{{--                    <form class="division" action="https://themebazar.xyz/laraflash/all/country/news" method="get">--}}
{{--                        <input type="hidden" name="_token" value="npv0BOp6m8gjl8YmLleA8kPNIXTsqhE6TJsDtfst">--}}



{{--                        <div class="input-division">--}}

{{--                            <select name="dist_name">--}}

{{--                                <option selected=""> --বিভাগ-- </option>--}}

{{--                                <option value="ঢাকা বিভাগ" required>ঢাকা বিভাগ </option>--}}
{{--                                <option value="সিলেট বিভাগ" required>সিলেট বিভাগ </option>--}}
{{--                                <option value="রাজশাহী বিভাগ" required>রাজশাহী বিভাগ </option>--}}
{{--                                <option value="রংপুর বিভাগ" required>রংপুর বিভাগ </option>--}}
{{--                                <option value="বরিশাল বিভাগ" required>বরিশাল বিভাগ </option>--}}
{{--                                <option value="চট্টগ্রাম বিভাগ" required>চট্টগ্রাম বিভাগ </option>--}}
{{--                                <option value="খুলনা বিভাগ" required>খুলনা বিভাগ </option>--}}
{{--                                <option value="ময়মনসিংহ বিভাগ" required>ময়মনসিংহ বিভাগ </option>--}}

{{--                            </select>--}}

{{--                        </div>--}}

{{--                        <div class="input-division">--}}

{{--                            <select name="subdist_name" id="subdist_name">--}}

{{--                                <option selected=""> --জেলা-- </option>--}}


{{--                            </select>--}}

{{--                        </div>--}}


{{--                        <div class="input-division">--}}

{{--                            <select name="thana_name" id="thana_name" style="margin-top: 10px">--}}

{{--                                <option selected=""> --উপজেলা-- </option>--}}



{{--                            </select>--}}

{{--                        </div>--}}



{{--                        <div class="input-division">--}}

{{--                            <input type="submit" value="খুজুন">--}}

{{--                        </div>--}}

{{--                    </form>--}}




{{--                    <!-- // Get District -->--}}
{{--                    <script type="text/javascript">--}}
{{--                        $(document).ready(function() {--}}
{{--                            $('select[name="dist_name"]').on('change', function(){--}}
{{--                                var dist_name = $(this).val();--}}
{{--                                if(dist_name) {--}}
{{--                                    $.ajax({--}}
{{--                                        url: "https://themebazar.xyz/laraflash/get/district/"+dist_name,--}}
{{--                                        type:"GET",--}}
{{--                                        dataType:"json",--}}
{{--                                        success:function(data) {--}}
{{--                                            $("#subdist_name").empty();--}}
{{--                                            $.each(data,function(key,value){--}}
{{--                                                $("#subdist_name").append('<option value="'+value.subdistrict+'">'+value.subdistrict+'</option>');--}}
{{--                                            });--}}

{{--                                        },--}}

{{--                                    });--}}
{{--                                } else {--}}
{{--                                    alert('danger');--}}
{{--                                }--}}

{{--                            });--}}
{{--                        });--}}
{{--                    </script>--}}
{{--                    <!-- // Get Thana -->--}}
{{--                    <script type="text/javascript">--}}
{{--                        $(document).ready(function() {--}}
{{--                            $('select[name="subdist_name"]').on('change', function(){--}}
{{--                                var subdist_name = $(this).val();--}}
{{--                                if(subdist_name) {--}}
{{--                                    $.ajax({--}}
{{--                                        url: "https://themebazar.xyz/laraflash/get/thana/"+subdist_name,--}}
{{--                                        type:"GET",--}}
{{--                                        dataType:"json",--}}
{{--                                        success:function(data) {--}}
{{--                                            $("#thana_name").empty();--}}
{{--                                            $.each(data,function(key,value){--}}
{{--                                                $("#thana_name").append('<option value="'+value.thana+'">'+value.thana+'</option>');--}}
{{--                                            });--}}

{{--                                        },--}}

{{--                                    });--}}
{{--                                } else {--}}
{{--                                    alert('danger');--}}
{{--                                }--}}

{{--                            });--}}
{{--                        });--}}
{{--                    </script>--}}
                    <div class="side-ad-box">
                        @if(!empty($ads->home_box2_ads))
                            <img src="{{ asset($ads->home_box2_ads) }}" alt="Sidebar Ad">
                        @else
                            <img src="{{ asset('front/templateimage/63ad66eeaa3fc.gif') }}" alt="Default Ad">
                        @endif
                    </div>

                    <style>
                        .side-ad-box {
                            width: 100%;
                            display: flex;
                            justify-content: center;
                            margin-bottom: 3px;
                        }
                        .side-ad-box img {
                            width: 100%;
                            height:auto; /* Sidebar ad height */
                            object-fit: contain;
                            background: #fff;
                            border-radius: 2px;
                            padding: 2px;
                            box-shadow: 0 1px 5px rgba(0,0,0,0.18);
                        }

                        /* Mobile Responsive */
                        @media (max-width: 767px) {
                            .side-ad-box img {
                                height: auto;
                                padding: 1px;
                                box-shadow: none;
                            }
                        }
                    </style>
                </div>

            </div>
        </div>
    </section>

    <div class="add-section2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="add-image">

                    </div>

                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="add-image">
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--=======================
                                         Section Four start
                                     ==========================-->
    <section class="section-four">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">


                    <div class="themesBazar_cat">
                        <a href="{{route('category-news',[$krrishi->id,$krrishi->slug])}}">{{$krrishi->name}}</a>
                        <span class="themeBazar"></span>
                    </div>

                    <div class="secFour-slider owl-carousel">

                        @foreach($krrishi5 as $krrishi1)
                            <div class="secFour-wrpp ">
                                <div class="secFour-image">
                                    <a href="{{route('news-detail',[$krrishi1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($krrishi1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$krrishi1->title}}"></a>

                                    <a href="#" class="video-icon3">  </a>

                                    <h5 class="secFour-title">
                                        <a href="{{route('news-detail',[$krrishi1->id])}}">{{$krrishi1->title}} </a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>




    <!--=======================
                                            Section Four End
                                     ==========================-->
    <div class="add-section3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="add-image">

                    </div>

                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="add-image">
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--=======================
                                           Section-Five-Start
                                     ==========================-->
    <section class="section-five">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">


                    <h1 class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$gonomadhym->id,$gonomadhym->slug])}}">{{$gonomadhym->name}}</a> </span>
                        <span2><a href="{{route('category-news',[$gonomadhym->id,$gonomadhym->slug])}}">  আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </h1>

                    <div class="white-bg">




                        <div class="secFive-image">
                            <a href="{{route('news-detail',[$gonomaddhonews1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($gonomaddhonews1->image)}}" alt="ল{{asset($webLogo->lazyload_logo)}}" title="{{$gonomaddhonews1->title}}"></a>

                            <a href="#" class="video-icon3">  </a>


                            <div class="secFive-title">
                                <a href="{{route('news-detail',[$gonomaddhonews1->id])}}">{{$gonomaddhonews1->title}}</a>
                            </div>
                        </div>
                        @foreach($gonomaddhonews3 as $gonomaddhom3)
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href="{{route('news-detail',[$gonomaddhom3->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($gonomaddhom3->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$gonomaddhom3->title}}"></a>

                                <a href="#" class="video-icon3">  </a>

                                <h5 class="secFive_title2">
                                    <a href="{{route('news-detail',[$gonomaddhom3->id])}}">{{$gonomaddhom3->title}} </a>
                                </h5>
                            </div>
                        </div>
                        @endforeach



                    </div>

                </div>

                <div class="col-lg-4 col-md-4">


                    <h1 class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$job->id,$job->slug])}}">{{$job->name}}</a> </span>
                        <span2><a href="{{route('category-news',[$job->id,$job->slug])}}">  আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </h1>

                    <div class="white-bg">




                        <div class="secFive-image">
                            <a href="{{route('news-detail',[$job1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($job1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$job1->title}}"></a>

                            <a href="#" class="video-icon3">  </a>


                            <div class="secFive-title">
                                <a href="{{route('news-detail',[$job1->id])}}">{{$job1->title}}</a>
                            </div>
                        </div>

                        @foreach($job3 as $job_1)
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href="{{route('news-detail',[$job_1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($job_1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$job_1->title}}"></a>

                                <a href="#" class="video-icon3">  </a>

                                <h5 class="secFive_title2">
                                    <a href="{{route('news-detail',[$job_1->id])}}">{{$job_1->title}}</a>
                                </h5>
                            </div>
                        </div>
                        @endforeach



                    </div>

                </div>


                <div class="col-lg-4 col-md-4">


                    <h1 class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$dhormo->id,$dhormo->slug])}}">{{$dhormo->name}}</a> </span>
                        <span2><a href="{{route('category-news',[$dhormo->id,$dhormo->slug])}}">  আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </h1>

                    <div class="white-bg">




                        <div class="secFive-image">
                            <a href="{{route('news-detail',[$dhormo1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($dhormo1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$dhormo1->title}}"></a>

                            <a href="#" class="video-icon3">  </a>

                            <div class="secFive-title">
                                <a href="{{route('news-detail',[$dhormo1->id])}}">{{$dhormo1->title}}</a>
                            </div>
                        </div>

                        @foreach($dhormo3 as $dhormo_1)
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href="{{route('news-detail',[$dhormo_1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($dhormo_1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$dhormo_1->title}}"></a>

                                <a href="#" class="video-icon3">  </a>

                                <h5 class="secFive_title2">
                                    <a href="{{route('news-detail',[$dhormo_1->id])}}">{{$dhormo_1->title}}</a>
                                </h5>
                            </div>
                        </div>
                        @endforeach



                    </div>

                </div>



            </div>
        </div>
    </section>
    <div class="add-section4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="add-image">

                    </div>

                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="add-image">
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--=======================
                                         Section Four start
                                     ==========================-->
    <section class="section-four">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">


                    <div class="themesBazar_cat">
                        <a href="{{route('category-news',[$campus->id,$campus->slug])}}">{{$campus->name}}</a>
                        <span class="themeBazar"></span>
                    </div>

                    <div class="secFour-slider owl-carousel">

                        @foreach($campusnewses5 as $campusnews)
                            <div class="secFour-wrpp ">
                                <div class="secFour-image">
                                    <a href="{{route('news-detail',[$campusnews->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($campusnews->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$campusnews->title}}"></a>

                                    <a href="#" class="video-icon3">  </a>

                                    <h5 class="secFour-title">
                                        <a href="{{route('news-detail',[$campusnews->id])}}"> {{$campusnews->title}}</a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--=======================
                                            Section Four End
                                     ==========================-->
    <div class="add-section4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="add-image">

                    </div>

                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="add-image">
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!--=======================
                                           Section-Five-Start
                                     ==========================-->
    <section class="section-five">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">


                    <h1 class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$sastho->id,$sastho->slug])}}">{{$sastho->name}}</a> </span>
                        <span2><a href="{{route('category-news',[$sastho->id,$sastho->slug])}}">  আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </h1>

                    <div class="white-bg">




                        <div class="secFive-image">
                            <a href="{{route('news-detail',[$sastho1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($sastho1->image)}}" alt="বি{{asset($webLogo->lazyload_logo)}} " title="{{$sastho1->title}}"></a>

                            <a href="#" class="video-icon3">  </a>


                            <div class="secFive-title">
                                <a href="{{route('news-detail',[$sastho1->id])}}">{{$sastho1->title}}</a>
                            </div>
                        </div>
                        @foreach($sastho3 as $sastho_1)
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href="{{route('news-detail',[$sastho_1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($sastho_1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$sastho_1->title}}"></a>

                                <a href="#" class="video-icon3">  </a>

                                <h5 class="secFive_title2">
                                    <a href="{{route('news-detail',[$sastho_1->id])}}">{{$sastho_1->title}}</a>
                                </h5>
                            </div>
                        </div>
                        @endforeach




                    </div>

                </div>

                <div class="col-lg-4 col-md-4">


                    <h1 class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$ainadalot->id,$ainadalot->slug])}}">{{$ainadalot->name}}</a> </span>
                        <span2><a href="{{route('category-news',[$ainadalot->id,$ainadalot->slug])}}">  আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </h1>

                    <div class="white-bg">



                        <div class="secFive-image">
                            <a href="{{route('news-detail',[$ainadalot1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($ainadalot1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$ainadalot1->title}}"></a>




                            <div class="secFive-title">
                                <a href="{{route('news-detail',[$ainadalot1->id])}}">{{$ainadalot1->title}}</a>
                            </div>
                        </div>

                        @foreach($ainadalot3 as $ainadalot_1)
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href="{{route('news-detail',[$ainadalot_1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($ainadalot_1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$ainadalot_1->title}}"></a>

                                <a href="#" class="video-icon3">  </a>

                                <h5 class="secFive_title2">
                                    <a href="{{route('news-detail',[$ainadalot_1->id])}}">{{$ainadalot_1->title}}</a>
                                </h5>
                            </div>
                        </div>
                        @endforeach



                    </div>

                </div>


                <div class="col-lg-4 col-md-4">


                    <h1 class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$shikkha->id,$shikkha->slug])}}">{{$shikkha->name}}</a> </span>
                        <span2><a href="{{route('category-news',[$shikkha->id,$shikkha->slug])}}">  আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </h1>

                    <div class="white-bg">




                        <div class="secFive-image">
                            <a href="{{route('news-detail',[$shikkha1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($shikkha1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$shikkha1->title}}"></a>

                            <a href="#" class="video-icon3">  </a>


                            <div class="secFive-title">
                                <a href="{{route('news-detail',[$shikkha1->id])}}">{{$shikkha1->title}}</a>
                            </div>
                        </div>

                        @foreach($shikkha3 as $shikkha_1)
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href="{{route('news-detail',[$shikkha_1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($shikkha_1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$shikkha_1->title}}"></a>

                                <a href="#" class="video-icon3">  </a>

                                <h5 class="secFive_title2">
                                    <a href="{{route('news-detail',[$shikkha_1->id])}}">{{$shikkha_1->title}}</a>
                                </h5>
                            </div>
                        </div>
                        @endforeach




                    </div>

                </div>



            </div>
        </div>
    </section>
    <div class="add-section4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="add-image">

                    </div>

                </div>

                <div class="col-lg-6 col-m-6">
                    <div class="add-image">

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!--=======================
                                         Section Four start
                                     ==========================-->
    <section class="section-four">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">


                    <div class="themesBazar_cat">
                        <a href="{{route('category-news',[$sompadokio->id,$sompadokio->slug])}}">{{$sompadokio->name}}</a>
                        <span class="themeBazar"></span>
                    </div>

                    <div class="secFour-slider owl-carousel">


                        @foreach($sompadokio5 as $sompadokio_1)
                        <div class="secFour-wrpp ">
                            <div class="secFour-image">
                                <a href="{{route('news-detail',[$sompadokio_1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($sompadokio_1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$sompadokio_1->title}}"></a>

                                <a href="#" class="video-icon3">  </a>

                                <h5 class="secFour-title">
                                    <a href="{{route('news-detail',[$sompadokio_1->id])}}">{{$sompadokio_1->title}}</a>
                                </h5>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--=======================
                                            Section Four End
                                     ==========================-->
    <div class="add-section4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="add-image">

                    </div>

                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="add-image">
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <!--=======================
                                           Section-Nine-Start
                                     ==========================-->
    <section class="section-seven">
        <div class="container">
            <h2 class="themesBazar_cat3">
                <a href="{{route('category-news',[$binodon->id,$binodon->slug])}}">{{$binodon->name}}</a>
                <span class="themeBazar3"></span>
            </h2>
            <div class="secSecven-color">
                <div class="row">
                    <div class="col-lg-6 col-md-6">



                        <div class="black-bg">
                            <div class="secSeven-image">
                                <a href="{{route('news-detail',[$binodon1->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($binodon1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title=" {{$binodon1->title}}"></a>

                                <a href="#" class="video-icon3">  </a>

                            </div>
                            <h6 class="secSeven-title">
                                <a href="{{route('news-detail',[$binodon1->id])}}"> {{$binodon1->title}}</a>
                            </h6>

                        </div>


                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            @foreach($binodon4 as $binodon_1 )
                            <div class="themesBazar-2 themesBazar-m2">
                                <div class="secSeven-wrpp ">
                                    <div class="secSeven-image2">
                                        <a href="{{route('news-detail',[$binodon_1->id])}}"> <img class="lazyload" src="{{asset($binodon_1->image)}}" data-src="" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$binodon_1->title}}"></a>

                                        <a href="#" class="video-icon3">  </a>

                                        <h5 class="secSeven-title2">
                                            <a href="{{route('news-detail',[$binodon_1->id])}}">{{$binodon_1->title}} </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach




                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <!--=======================
                                           Section-Five-Start
                                     ==========================-->
{{--    <section class="section-five">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-4 col-md-4">--}}


{{--                    <h1 class="themesBazar_cat_one">--}}
{{--                        <span><a href="news/category/health.html"> স্বাস্থ্য </a> </span>--}}
{{--                        <span2><a href="news/category/health.html">  আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>--}}
{{--                    </h1>--}}

{{--                    <div class="white-bg">--}}




{{--                        <div class="secFive-image">--}}
{{--                            <a href="97.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbc526482e.jpg" alt="জলবায়ুর পরিবর্তনের সঙ্গে সঙ্গে পরিবর্তন ঘটছে এডিস মশার ধরনেও" title="জলবায়ুর পরিবর্তনের সঙ্গে সঙ্গে পরিবর্তন ঘটছে এডিস মশার ধরনেও"></a>--}}

{{--                            <a href="#" class="video-icon3">  </a>--}}


{{--                            <div class="secFive-title">--}}
{{--                                <a href="97.html"> জলবায়ুর পরিবর্তনের সঙ্গে সঙ্গে পরিবর্তন ঘটছে এডিস মশার ধরনেও  </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="secFive-smallItem">--}}
{{--                            <div class="secFive-smallImg">--}}
{{--                                <a href="96.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbc11cd5d5.jpg" alt="তীব্র শীতে শিশু ও বয়স্কদের জন্য যে পরামর্শ দিলেন চিকিৎসক" title="তীব্র শীতে শিশু ও বয়স্কদের জন্য যে পরামর্শ দিলেন চিকিৎসক"></a>--}}

{{--                                <a href="#" class="video-icon3">  </a>--}}

{{--                                <h5 class="secFive_title2">--}}
{{--                                    <a href="96.html"> তীব্র শীতে শিশু ও বয়স্কদের জন্য যে পরামর্শ দিলেন চিকিৎসক  </a>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="secFive-smallItem">--}}
{{--                            <div class="secFive-smallImg">--}}
{{--                                <a href="95.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbbdf2f83e.jpg" alt="চিকিৎসা সেবায় বাড়ছে বৈষম্য, গরিবদের চেয়ে ৮ গুণ বেশি খরচ করেন ধনীরা (ভিডিও)" title="চিকিৎসা সেবায় বাড়ছে বৈষম্য, গরিবদের চেয়ে ৮ গুণ বেশি খরচ করেন ধনীরা (ভিডিও)"></a>--}}

{{--                                <a href="#" class="video-icon3">  </a>--}}

{{--                                <h5 class="secFive_title2">--}}
{{--                                    <a href="95.html"> চিকিৎসা সেবায় বাড়ছে বৈষম্য, গরিবদের চেয়ে ৮ গুণ বেশি খরচ করেন ধনীরা (ভিডিও)  </a>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="secFive-smallItem">--}}
{{--                            <div class="secFive-smallImg">--}}
{{--                                <a href="94.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbbb0da336.jpg" alt="করোনায় মৃত্যুহীন দিনে শনাক্ত ১৭" title="করোনায় মৃত্যুহীন দিনে শনাক্ত ১৭"></a>--}}

{{--                                <a href="#" class="video-icon3">  </a>--}}

{{--                                <h5 class="secFive_title2">--}}
{{--                                    <a href="94.html"> করোনায় মৃত্যুহীন দিনে শনাক্ত ১৭  </a>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}



{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="col-lg-4 col-md-4">--}}


{{--                    <h1 class="themesBazar_cat_one">--}}
{{--                        <span><a href="news/category/court-of-law.html"> আইন আদালত </a> </span>--}}
{{--                        <span2><a href="news/category/court-of-law.html">  আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>--}}
{{--                    </h1>--}}

{{--                    <div class="white-bg">--}}




{{--                        <div class="secFive-image">--}}
{{--                            <a href="102.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbd881f6a1.jpg" alt="ম্যুরালে বঙ্গবন্ধু ও প্রধানমন্ত্রীর সঙ্গে কারও ছবি নয়: হাইকোর্ট" title="ম্যুরালে বঙ্গবন্ধু ও প্রধানমন্ত্রীর সঙ্গে কারও ছবি নয়: হাইকোর্ট"></a>--}}

{{--                            <a href="#" class="video-icon3">  </a>--}}


{{--                            <div class="secFive-title">--}}
{{--                                <a href="102.html"> ম্যুরালে বঙ্গবন্ধু ও প্রধানমন্ত্রীর সঙ্গে কারও ছবি নয়: হাইকোর্ট  </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="secFive-smallItem">--}}
{{--                            <div class="secFive-smallImg">--}}
{{--                                <a href="101.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbd4906458.jpg" alt="আপাতত হাতিরঝিলে কোনো উচ্ছেদ নয়: আপিল বিভাগ (ভিডিও)" title="আপাতত হাতিরঝিলে কোনো উচ্ছেদ নয়: আপিল বিভাগ (ভিডিও)"></a>--}}

{{--                                <a href="#" class="video-icon3">  </a>--}}

{{--                                <h5 class="secFive_title2">--}}
{{--                                    <a href="101.html"> আপাতত হাতিরঝিলে কোনো উচ্ছেদ নয়: আপিল বিভাগ (ভিডিও)  </a>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="secFive-smallItem">--}}
{{--                            <div class="secFive-smallImg">--}}
{{--                                <a href="100.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbd1a11894.jpg" alt="ওয়াসার এমডির ১৪ বাড়ি: দুদকের অগ্রগতি জানতে চাইলেন হাইকোর্ট (ভিডিও)" title="ওয়াসার এমডির ১৪ বাড়ি: দুদকের অগ্রগতি জানতে চাইলেন হাইকোর্ট (ভিডিও)"></a>--}}

{{--                                <a href="#" class="video-icon3">  </a>--}}

{{--                                <h5 class="secFive_title2">--}}
{{--                                    <a href="100.html"> ওয়াসার এমডির ১৪ বাড়ি: দুদকের অগ্রগতি জানতে চাইলেন হাইকোর্ট (ভিডিও)  </a>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="secFive-smallItem">--}}
{{--                            <div class="secFive-smallImg">--}}
{{--                                <a href="99.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbce8993ce.jpg" alt="পরীমণির মাদক মামলা স্থগিত থাকবে: আপিল বিভাগ" title="পরীমণির মাদক মামলা স্থগিত থাকবে: আপিল বিভাগ"></a>--}}

{{--                                <a href="#" class="video-icon3">  </a>--}}

{{--                                <h5 class="secFive_title2">--}}
{{--                                    <a href="99.html"> পরীমণির মাদক মামলা স্থগিত থাকবে: আপিল বিভাগ  </a>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}



{{--                    </div>--}}

{{--                </div>--}}


{{--                <div class="col-lg-4 col-md-4">--}}


{{--                    <h1 class="themesBazar_cat_one">--}}
{{--                        <span><a href="news/category/opinion.html"> মতামত </a> </span>--}}
{{--                        <span2><a href="news/category/opinion.html">  আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>--}}
{{--                    </h1>--}}

{{--                    <div class="white-bg">--}}




{{--                        <div class="secFive-image">--}}
{{--                            <a href="107.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbea465c94.jpg" alt="খুলনা বিশ্ববিদ্যালয়: স্বতন্ত্র বৈশিষ্ট্যে সমুজ্জ্বল " title="খুলনা বিশ্ববিদ্যালয়: স্বতন্ত্র বৈশিষ্ট্যে সমুজ্জ্বল "></a>--}}

{{--                            <a href="#" class="video-icon3">  </a>--}}


{{--                            <div class="secFive-title">--}}
{{--                                <a href="107.html"> খুলনা বিশ্ববিদ্যালয়: স্বতন্ত্র বৈশিষ্ট্যে সমুজ্জ্বল   </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="secFive-smallItem">--}}
{{--                            <div class="secFive-smallImg">--}}
{{--                                <a href="106.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbe6875836.jpg" alt="ইন্টারনেট: ব্যবহার, অপব্যবহার, অতিব্যবহার ও আসক্তি" title="ইন্টারনেট: ব্যবহার, অপব্যবহার, অতিব্যবহার ও আসক্তি"></a>--}}

{{--                                <a href="#" class="video-icon3">  </a>--}}

{{--                                <h5 class="secFive_title2">--}}
{{--                                    <a href="106.html"> ইন্টারনেট: ব্যবহার, অপব্যবহার, অতিব্যবহার ও আসক্তি  </a>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="secFive-smallItem">--}}
{{--                            <div class="secFive-smallImg">--}}
{{--                                <a href="105.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbe35642fe.jpg" alt="বিজয়ের পুরো অর্থ আমাদের বুঝতে হবে" title="বিজয়ের পুরো অর্থ আমাদের বুঝতে হবে"></a>--}}

{{--                                <a href="#" class="video-icon3">  </a>--}}

{{--                                <h5 class="secFive_title2">--}}
{{--                                    <a href="105.html"> বিজয়ের পুরো অর্থ আমাদের বুঝতে হবে  </a>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="secFive-smallItem">--}}
{{--                            <div class="secFive-smallImg">--}}
{{--                                <a href="104.html"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbe07b798a.jpg" alt="রোহিঙ্গা ঝুঁকিতে পর্যটন শিল্প নগরী কক্সবাজার" title="রোহিঙ্গা ঝুঁকিতে পর্যটন শিল্প নগরী কক্সবাজার"></a>--}}

{{--                                <a href="#" class="video-icon3">  </a>--}}

{{--                                <h5 class="secFive_title2">--}}
{{--                                    <a href="104.html"> রোহিঙ্গা ঝুঁকিতে পর্যটন শিল্প নগরী কক্সবাজার  </a>--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}



{{--                    </div>--}}

{{--                </div>--}}



{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!--=======================
                                Section-Eleven-Start
                            ==========================-->

    <section class="section-nine">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9">

                    <div class="themesBazar_cat2">
                        <a href="{{route('category-news',[$totthoprojukti->id,$totthoprojukti->slug])}}">{{$totthoprojukti->name}}</a>
                        <span class="themeBazar2"></span>
                    </div>

                    <div class="row">


                        @foreach($totthoprojukti3 as $totthoprojukti_3)
                        <div class="themesBazar-3 themesBazar-m2">
                            <div class="secEight-wrpp bg-4">
                                <div class="secEight-image">
                                    <a href="{{route('news-detail',[$totthoprojukti_3->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($totthoprojukti_3->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$totthoprojukti_3->title}}"></a>

                                    <a href="#" class="video-icon3">  </a>

                                </div>
                                <h2 class="secEight-title">
                                    <a href="{{route('news-detail',[$totthoprojukti_3->id])}}"> {{$totthoprojukti_3->title}} </a>
                                </h2>
                            </div>
                        </div>
                        @endforeach



                    </div>


                    <div class="row">

                        @foreach($totthoprojukti4 as $totthoprojukti_4)
                        <div class="themesBazar-4 themesBazar-m2">
                            <div class="secEight-wrpp2 bg-4">
                                <div class="secEight-image2">
                                    <a href="{{route('news-detail',[$totthoprojukti_4->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($totthoprojukti_4->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$totthoprojukti_4->title}}"></a>

                                    <a href="#" class="video-icon3">  </a>

                                </div>
                                <h2 class="secEight-title">
                                    <a href="{{route('news-detail',[$totthoprojukti_4->id])}}">{{$totthoprojukti_4->title}}</a>
                                </h2>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>

                <div class="col-lg-3 col-md-3">

                    <div class="live-item">
                        <div class="live_title">
                            <a href="#"> লাইভ</a>
                            <div class="themesBazar"></div>
                        </div>
                        <div class="popup-wrpp">
                            <div class="live_image">
                                <img src="{{asset('/')}}front/frontend/assets/images/livetv.jpg" alt="লাইভ টিভি">
                                <div data-mfp-src="#mymodal" class="live-icon modal-live" > <i class="las la-play"></i> </div>
                            </div>

                            <div class="live-popup"> <!-- Quick view Start-->
                                <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles" aria-describedby="modal-contents">
                                    <div id="modal-contents">



                                        <!-- Load Facebook SDK for JavaScript -->
                                        <div id="fb-root"></div>
                                        <script>
                                            window.fbAsyncInit = function() {
                                                FB.init({
                                                    appId      : '{your-app-id}',
                                                    xfbml      : true,
                                                    version    : 'v2.5'
                                                });

                                                // Get Embedded Video Player API Instance
                                                var my_video_player;
                                                FB.Event.subscribe('xfbml.ready', function(msg) {
                                                    if (msg.type === 'video') {
                                                        my_video_player = msg.instance;
                                                        my_video_player.unmute();
                                                    }
                                                });
                                            };

                                            (function(d, s, id){
                                                var js, fjs = d.getElementsByTagName(s)[0];
                                                if (d.getElementById(id)) {return;}
                                                js = d.createElement(s); js.id = id;
                                                js.src = "../../connect.facebook.net/en_US/sdk.js";
                                                fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));
                                        </script>

                                        <!-- Your embedded video player code -->
                                        <div
                                            class="fb-video"
                                            data-href="https://www.facebook.com/somoynews.tv/videos/5741322025915134"
                                            data-width="auto"
                                            data-autoplay="true"
                                            data-allowfullscreen="false"
                                            data-controls="false"></div>




                                    </div>
                                </div>
                            </div>  <!-- Quick View End-->
                        </div>

                    </div>




                </div>

            </div>
        </div>
    </section>



    <!--=======================
                                Section-Eleven-End
                            ==========================-->

    <!--=======================
                                Section-twelve-Start
                            ==========================-->

    <!-- section one categori  -->
    <div class="section-nine">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">


                    <div class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$motamot->id,$motamot->slug])}}">{{$motamot->name}}</a> </span>
                        <span2><a href="{{route('category-news',[$motamot->id,$motamot->slug])}}"> আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </div>
                    @foreach($motamot3 as $motamot_3)
                    <div class="secOne-smallItem">
                        <div class="secOne-smallImg2">
                            <a href="{{route('news-detail',[$motamot_3->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($motamot_3->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$motamot_3->title}}"></a>

                            <a href="#" class="video-icon3">  </a>

                            <h5 class="secOne_smallTitle">
                                <a href="{{route('news-detail',[$motamot_3->id])}}">{{$motamot_3->title}}</a>
                            </h5>
                        </div>
                    </div>
                    @endforeach



                </div>

                <div class="col-lg-4 col-md-4">


                    <div class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$bussiness->id,$bussiness->slug])}}">{{$bussiness->name}}</a> </span>
                        <span2><a href="{{route('category-news',[$bussiness->id,$bussiness->slug])}}"> আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </div>

                    @foreach($bussiness3 as $bussiness_3)
                    <div class="secOne-smallItem">
                        <div class="secOne-smallImg2">
                            <a href="{{route('news-detail',[$bussiness_3->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($bussiness_3->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$bussiness_3->title}}"></a>

                            <a href="#" class="video-icon3">  </a>

                            <h5 class="secOne_smallTitle">
                                <a href="{{route('news-detail',[$bussiness_3->id])}}">{{$bussiness_3->title}}</a>
                            </h5>
                        </div>
                    </div>
                    @endforeach



                </div>

                <div class="col-lg-4 col-md-4">


                    <div class="themesBazar_cat_one">
                        <span><a href="{{route('category-news',[$sharebazar->id,$sharebazar->slug])}}">{{$sharebazar->name}}</a> </span>
                        <span2><a href="{{route('category-news',[$sharebazar->id,$sharebazar->slug])}}"> আরো খবর <i class="la la-angle-double-right"></i></a>  </span2>
                    </div>
                    @foreach($sharebazar3 as $sharebazer_3)
                    <div class="secOne-smallItem">
                        <div class="secOne-smallImg2">
                            <a href="{{route('news-detail',[$sharebazer_3->id])}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($sharebazer_3->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$sharebazer_3->title}}"></a>

                            <a href="#" class="video-icon3">  </a>

                            <h5 class="secOne_smallTitle">
                                <a href="{{route('news-detail',[$sharebazer_3->id])}}">{{$sharebazer_3->title}}</a>
                            </h5>
                        </div>
                    </div>
                    @endforeach


                </div>

            </div>
        </div>
    </div>

    <!--=======================
                                Section-twelve-Start
                            ==========================-->

    <!--=======================
                                Section-Ten-Start
                            ==========================-->
    <section class="section-ten">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="themesBazar_cat">
                        <a href="#"><i class="las la-camera"></i> ফটোগ্যালারী </a>
                        <span class="themeBazar"></span>
                    </div>


                    <div class="homeGallery owl-carousel">

                        @foreach($sliders as $slider)
                        <div class="item" >
                            <div class="photo">
                                <a class="themeGallery" href="{{asset($slider->image)}}">
                                    <img src="{{asset($slider->image)}}" alt="{{$slider->title}}" /></a>
                                <h3 class="photoCaption">
                                    <a href="#">{{$slider->title}}</a>
                                </h3>
                            </div>
                        </div>
                        @endforeach






                    </div>


                    <div class="homeGallery1 owl-carousel">

                        @foreach($sliders as $slider)
                        <div  class="item">
                            <div class="phtot2">
                                <a class="themeGallery" href="{{asset($slider->image)}}">
                                    <img src="{{asset($slider->image)}}" alt="{{$slider->title}}" /></a>
                            </div>
                        </div>
                        @endforeach


                    </div>



                </div>
                <div class="col-lg-4 col-md-4">

                    <div class="themesBazar_cat">
                        <a href="#"><i class="las la-camera"></i> ভিডিও গ্যালারী </a>
                        <span class="themeBazar"></span>
                    </div>


                    <div class="white-bg">
                        @foreach($videos5 as $video)
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href="{{$video->link}}"> <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($video->image)}}"></a>

                                <a href="{{$video->link}}" class="video-icon popup"><i class="las la-video"></i></a>

                                <h5 class="secFive_title2">
                                    <a href="{{$video->link}}" class="popup">{{$video->title}} </a>
                                </h5>
                            </div>
                        </div>
                        @endforeach






                    </div>

                </div>
            </div>
        </div>
    </section>


    <!--=======================
                                Section-Ten-End
                            ==========================-->

@endsection
