@extends('master.front.master')
@section('title')
    {{$news->title}}
@endsection

@section('og:title')
    {{$news->title ?? config('app.name') }}
@endsection
@section('keyword')
    {{$news->seo_tag}}
@endsection
@section('og:description')
    {{ strip_tags($news->description) ?: 'সর্বশেষ খবর, বিশ্লেষণ এবং প্রতিবেদন পড়ুন আমাদের পোর্টালে।' }}
@endsection

@section('og:image')
    {{ route('news.ogimage', $news->id) }}
@endsection



{{--@section('og:image')--}}
{{--    {{ route('news.ogimage', $news->id) }}--}}
{{--@endsection--}}


@section('body')

    <div class="single-page2" >

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-page2-topAdd">


                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-lg-7 col-md-9">
                    <div class="single-home2">
                        <div class="single-white">
                            <div class="single-home-cat2">
                                <ul>
                                    <li><a href="{{route('home')}}"> <i class="las la-home"></i> প্রচ্ছদ </a> <i class="las la-angle-double-right"></i></li>
                                    <li><a href="#"> জাতীয় </a> <i class="las la-angle-double-right"></i> </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="single-white2 ">
{{--                        <h5 class="single-page2-subTitle">--}}
{{--                            সাব হেডিং সাব হেডিং সাব হেডিং সাব হেডিং সাব হেডিং সাব হেডিং সাব হেডিং--}}
{{--                        </h5>--}}

                        <h1 class="single-page2-title">
                            {{$news->title}}
                        </h1>
                        <div class="update-time">

                            <ul>
                                <li>  <a href="#"> <img src="{{asset($news->reporter->image)}}" alt="">{{$news->reporter->name}},{{$news->reporter->designation}}</a>
                                </li>
                                <li>
                                    <i class="lar la-clock"></i>
                                    আপলোড সময় :
                                    @php
                                        use Carbon\Carbon;

                                        // বাংলাদেশ টাইমজোন সেট করো
                                        $date = Carbon::parse($news->created_at)
                                            ->timezone('Asia/Dhaka')   // ← গুরুত্বপূর্ণ লাইন
                                            ->locale('bn');

                                        $formatted = $date->translatedFormat('d F Y, h:i A');

                                        // ইংরেজি সংখ্যা ও AM/PM → বাংলায় রূপান্তর
                                        $english = ['0','1','2','3','4','5','6','7','8','9','AM','PM'];
                                        $bangla  = ['০','১','২','৩','৪','৫','৬','৭','৮','৯','পূর্বাহ্ণ','অপরাহ্ণ'];

                                        echo str_replace($english, $bangla, $formatted);
                                    @endphp
                                </li>
                                @php
                                    function bn_number($number) {
                                        $en = ['0','1','2','3','4','5','6','7','8','9'];
                                        $bn = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
                                        return str_replace($en, $bn, $number);
                                    }
                                @endphp
                                <li class="view-count">
                                    <p>
                                        <i class="las la-eye"></i>
                                        {{ bn_number($news->view_count) }} বার পড়া হয়েছে
                                    </p>
                                </li>

                                <style>
                                    .view-count p {
                                        display: flex;
                                        align-items: center;
                                        gap: 5px;
                                        background: #f0f0f0;
                                        padding: 5px 12px;
                                        border-radius: 12px;
                                        font-weight: 500;
                                        color: #333;
                                        font-size: 14px;
                                        width: fit-content;
                                    }

                                    .view-count i {
                                        color: #ff5722;
                                    }
                                </style>
                            </ul>


                            <ul>




{{--                                <li>--}}
{{--                                    <i class="lar la-clock"></i>--}}
{{--                                    আপডেট সময় :--}}
{{--                                    @if(isset($news->updated_at) && $news->updated_at)--}}
{{--                                        @php--}}
{{--                                            $date = \Carbon\Carbon::parse($news->updated_at)--}}
{{--                                                ->timezone('Asia/Dhaka')   // Bangladesh Time--}}
{{--                                                ->locale('bn');--}}

{{--                                            $formatted = $date->translatedFormat('d F Y, h:i A');--}}

{{--                                            // ইংরেজি → বাংলা রূপান্তর--}}
{{--                                            $english = ['0','1','2','3','4','5','৬','৭','৮','৯','AM','PM'];--}}
{{--                                            $bangla  = ['০','১','২','৩','৪','৫','৬','৭','৮','৯','পূর্বাহ্ণ','অপরাহ্ণ'];--}}

{{--                                            echo str_replace($english, $bangla, $formatted);--}}
{{--                                        @endphp--}}
{{--                                    @else--}}
{{--                                        — কোন আপডেট নেই —--}}
{{--                                    @endif--}}
{{--                                </li>--}}






                            </ul>

                        </div>
                        @if(isset($ads->news_head_ads) && $ads->news_head_ads != '')
                            <div style="margin:0 auto 5px;">
                                <img
                                    src="{{ asset($ads->news_head_ads) }}"
                                    alt="Banner Ad"
                                    style="object-fit:contain;display:block;margin:0 auto;background:#fff;"
                                />
                            </div>
                        @else
                            <div style="margin:0 auto 5px;">
                                <img
                                    src="{{ asset('front/templateimage/63ad66eeaa3fc.gif') }}"
                                    alt="Default Banner Ad"
                                    style="object-fit:contain;display:block;margin:0 auto;background:#fff;"
                                />
                            </div>
                        @endif


                        <div class="single-image2">
                            <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($news->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$news->title}}" width="100%" height="auto">
                            <span style="font-style: italic; color: #333;">{{$news->image_caption}} </span>



                        </div>
                        <!-- শুধু ব্যানার দেখানোর জন্য একটি ডিভ -->
                        @if(isset($ads->news_pics_under_ads) && $ads->news_pics_under_ads != '')
                            <div class="banner-wrapper" style="margin:0 auto 5px auto;overflow:hidden;text-align:center;">
                                <img
                                    class="banner-img"
                                    src="{{ asset($ads->news_pics_under_ads) }}"
                                    width="800"
                                    height="70"
                                    alt="Banner Ad"
                                    style="object-fit:contain;display:block;margin:0 auto;background:#fff;"
                                />
                            </div>
                        @else
                            <div class="banner-wrapper">
                                <img
                                    class="banner-img"
                                    src="{{ asset('front/templateimage/63ad66eeaa3fc.gif') }}"
                                    width="800"
                                    height="70"
                                    alt="Default Banner Ad"
                                />
                            </div>
                        @endif




                        <div class="single-page-add2">


                        </div>

                        <div class="single-content2">

                            <style>
                                /* Base text rule */
                                .single-content2,
                                .single-content2 *{
                                    font-family: SolaimanLipi, 'Noto Serif Bengali', serif !important;
                                    font-size: 18px !important;

                                    /* 🔥 light line gap */
                                    line-height: 1.3 !important;

                                    color: #222 !important;

                                    /* full width text */
                                    text-align: justify !important;
                                    text-justify: inter-word;

                                    /* spacing control */
                                    letter-spacing: 0 !important;
                                    word-spacing: -0.6px !important;

                                    margin: 0 !important;
                                    padding: 0 !important;
                                }

                                /* Paragraph = very light gap */
                                .single-content2 p{
                                    margin-bottom: 0.35em !important; /* 🔥 never full line */
                                }

                                /* Headings behave like normal text */
                                .single-content2 h1,
                                .single-content2 h2,
                                .single-content2 h3,
                                .single-content2 h4,
                                .single-content2 h5,
                                .single-content2 h6{
                                    font-weight: normal !important;
                                    margin: 0.35em 0 !important;
                                }

                                /* Mobile tuning */
                                @media (max-width: 576px){
                                    .single-content2,
                                    .single-content2 *{
                                        font-size: 17px !important;
                                        line-height: 1.35 !important;
                                        word-spacing: -0.4px !important;
                                    }

                                    .single-content2 p{
                                        margin-bottom: 0.3em !important;
                                    }
                                }

                                /* Images */
                                .single-content2 img{
                                    max-width: 100%;
                                    height: auto;
                                    display: block;
                                    margin: 0.4em auto !important;
                                }
                            </style>

                            {!! $news->description !!}
                        </div>


















                        </br>
{{--                        নিউজটি আপডেট করেছেন : Admin News--}}
                        </br></br>




                        <div class="row">
                            <div class="col-lg-9 col-md-9">
                                <script type="text/javascript" src="../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-635cdf45c2d9fb68"></script>

                                <div class="addthis_inline_share_toolbox"></div>
                            </div>


                            @php
                                $encodedUrl = urlencode(Request::url());
                            @endphp

                            <style>
                                .share-icons {
                                    margin-bottom: 15px; /* নিচে gap */
                                }
                                .share-icons a img {
                                    width: 38px;
                                    height: 38px;
                                    border-radius: 6px;
                                    object-fit: cover;
                                    transition: 0.3s;
                                    margin-right: 6px;
                                }
                                .share-icons a img:hover {
                                    transform: scale(1.12);
                                    box-shadow: 0 2px 8px rgba(0,0,0,0.25);
                                }
                            </style>

                            <div class="col-lg-9 col-md-3">

                                <div class="share-icons d-flex align-items-center gap-2">

                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}" target="_blank">
                                        <img src="https://img.icons8.com/fluency/48/facebook-new.png" alt="facebook">
                                    </a>

                                    <a href="https://twitter.com/intent/tweet?url={{ $encodedUrl }}" target="_blank">
                                        <img src="https://img.icons8.com/fluency/48/twitter.png" alt="twitter">
                                    </a>

                                    <a href="https://www.linkedin.com/shareArticle?url={{ $encodedUrl }}" target="_blank">
                                        <img src="https://img.icons8.com/fluency/48/linkedin.png" alt="linkedin">
                                    </a>

                                    <a href="https://wa.me/?text={{ $encodedUrl }}" target="_blank">
                                        <img src="https://img.icons8.com/fluency/48/whatsapp.png" alt="whatsapp">
                                    </a>

                                    <a href="fb-messenger://share?link={{ $encodedUrl }}" target="_blank">
                                        <img src="https://img.icons8.com/fluency/48/facebook-messenger.png" alt="messenger">
                                    </a>

                                </div>



                            </div>


                            <style>
                                .custom-btn{
                                    width: 100%;
                                    text-align: center;
                                    padding: 8px 0;
                                    font-weight: 600;
                                    border-radius: 6px;
                                    color: #fff;
                                    display:block;
                                    transition: .3s;
                                }

                                .print-btn{
                                    background: #3b5998;
                                }
                                .print-btn:hover{
                                    background: #2c3f73;
                                }

                                .photo-btn{
                                    background: #e91e63;
                                }
                                .photo-btn:hover{
                                    background: #b3154c;
                                }
                            </style>


                            <div class="col-lg-3 col-md-3">
                                <div class="single-social" style="display:flex; gap:10px;">
                                    <a href="{{route('print-page',$news->id)}}" class="custom-btn print-btn">প্রিন্ট করুন <i class="las la-print"></i></a>
                                    <a href="{{route('photo-cart',$news->id)}}" class="custom-btn photo-btn">ফটোকার্ড <i class="las la-image"></i></a>
{{--                                    <a href="{{route('news-image',$news->id)}}" class="custom-btn photo-btn">image <i class="las la-image"></i></a>--}}
                                </div>
                            </div>


                        </div>


                        <!-- Facebook Like/React Button -->
{{--                        <div class="fb-like"--}}
{{--                             data-href="{{ url('news-details/'.$news->id) }}"--}}
{{--                             data-layout="standard"--}}
{{--                             data-action="like"--}}
{{--                             data-size="large"--}}
{{--                             data-share="true">--}}
{{--                        </div>--}}

{{--                        <br><br>--}}
{{--                        <hr>--}}

                        <!-- Facebook Comments -->
                        <h4>কমেন্ট করুন:</h4>
                        <div class="fb-comments"
                             data-href="{{ url('news-details/'.$news->id) }}"
                             data-width="100%"
                             data-numposts="8">
                        </div>



                        {{--                        <div style="margin-top: 20px; border-bottom: 1px solid #ddd; padding: 8px 0px;"> কমেন্ট বক্স </div>--}}






                    </div>


                    <!-- Author start -->
                    <div class="author">

                        <div class="author-content">

                            <h6 class="author-caption">
                                <span> প্রতিবেদকের তথ্য  </span>
                            </h6>

                            <div class="author-image">
                                <a href="{{route('reporter-view',[$news->reporter->id,$news->reporter->slug])}}">
                                <img src="{{asset($news->reporter->image)}}" alt="{{$news->reporter->name}}">
                                </a>
                            </div>

                            <h1 class="author-name">
                                <a href="{{route('reporter-view',[$news->reporter->id,$news->reporter->slug])}}">{{$news->reporter->name}}</a>
                            </h1>

                            <div class="author-title">
                                <strong><a href="{{route('reporter-view',[$news->reporter->id,$news->reporter->slug])}}"> প্রতিবেদকের সকল নিউজ </a></strong>
                            </div>


                        </div>




                    </div>
                    <div class="col-lg-3 col-md-4">

                        <div class="archive-title">
                            ফেসবুকে আমরা
                        </div>

                        <!-- Mobile Only -->
                        <div class="facebook-content mobile-only" style="position: relative; padding-bottom: 42%; height: 0; overflow: hidden;">
                            <iframe
                                src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/profile.php?id=61584115153421&amp;tabs=time&amp;width=280&amp;height=120&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=334182264340964"
                                style="position: absolute; top:0; left:0; width:100%; height:100%; border:none; overflow:hidden;"
                                scrolling="no"
                                frameborder="0"
                                allowfullscreen="true"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                            </iframe>
                        </div>

                    </div>

                    <style>
                        /* Mobile only */
                        .mobile-only {
                            display: none; /* By default hidden */
                        }

                        @media (max-width: 768px) {
                            .mobile-only {
                                display: block; /* Show on mobile */
                            }
                        }
                    </style>



                    <!-- Author End -->

                    <!--======== Related news start ========-->
                    <div class="related-section">
                        <div class="related-new-cat">
                            <span><a href="#"> এ জাতীয় আরো খবর </a></span>
                        </div>
                        <div class="single-white">
                            <div class="related-news-content2"> <!--Related News start-->
                                <div class="row">


                                    @foreach($relatedNews as $relatednews1)
                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="related-news-wrpp2"> <!--Related Wrpp start-->
                                            <div class="relatedImage2">
                                                <a href="{{route('news-detail',$relatednews1->id)}}">
                                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($relatednews1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$relatednews1->title}}">
                                                </a>


                                            </div>
                                            <h4 class="relatedTitle2"><a href="{{route('news-detail',[$relatednews1->id])}}">{{$relatednews1->title}}</a></h4>

                                        </div> <!--Related Wrpp End-->
                                    </div>
                                    @endforeach



                                </div>





                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-2 col-md-3 order-first">
                    <div class="fixrd-sitber" style="position: sticky; top: 0;">
                        <div class="single-white ">
                            <div class="latest-title">
                                <i class="fas fa-map-marker-alt"></i>  সর্বশেষ সংবাদ
                            </div>
                            <div class="single-itemContent">
                                <div class="row">
                                    @foreach($latestnews_10 as $latestnews_1)
                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <a href="{{route('news-detail',$latestnews_1->id)}}">
                                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($latestnews_1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$latestnews_1->title}}">
                                                </a>

                                            </div>
                                            <h4 class="leftSitbe-title"><a href="{{route('news-detail',[$latestnews_1->id])}}">{{$latestnews_1->title}}</a></h4>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>


                                <div class="seingle2-sitebarAdd2">


                                </div>




                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8">
                    <div class="fixrd-sitber" style="position: sticky; top: 0;">

                        <div class="single-white">


                            <div class="side-ad-box">
                                @if(!empty($ads->news_box_ads))
                                    <img src="{{ asset($ads->news_box_ads) }}" alt="Sidebar Ad">
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
                            <div class="popular-cat">
                                আলোচিত সংবাদ
                            </div>









                            <div class="popular-content"> <!--Popular Content-->
                                <div class="row">



                                    @foreach($popularNews10 as $popularnews)
                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <a href="{{route('news-detail',$popularnews->id)}}">
                                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($popularnews->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$popularnews->title}}">
                                                </a>

                                            </div>
                                            <h4 class="rSitebar-title2"><a href="{{route('news-detail',[$popularnews->id])}}">{{$popularnews->title}}</a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>
                                    @endforeach



                                </div>




                            </div>


                        </div>

                        <div class="seingle2-sitebarAdd2">


                        </div>

                    </div>


                </div>
            </div>
        </div>


    </div>

@endsection
