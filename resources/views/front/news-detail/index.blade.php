@extends('master.front.master')
@section('title')
    {{$news->title}}
@endsection
@section('og:title')
    {{$news->title ?? config('app.name') }}
@endsection

@section('og:description')
    {{ $news->description ?? 'সর্বশেষ খবর, বিশ্লেষণ এবং প্রতিবেদন পড়ুন আমাদের পোর্টালে।' }}
@endsection

@section('og:image')
    {{ asset(($news->image ?? 'frontend/images/og-default.jpg') . '?v=' . time()) }}
@endsection
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
                                |<a href="{{route('print-page',$news->id)}}">poto cart</a>
                                </li>
                            </ul>


                            <ul>

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
                               <li><p><i class="las la-eye"></i> {{ $news->view_count }} views</p></li>


                            </ul>

                        </div>
                        <div class="single-image2">
                            <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($news->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$news->title}}" width="100%" height="auto">
                            <span style="font-style: italic; color: #333;">{{$news->image_caption}} </span>



                        </div>

                        <div class="single-page-add2">


                        </div>

                        <div class="single-content2">
                           {!!$news->description  !!}
                        </div>

                        </br>
{{--                        নিউজটি আপডেট করেছেন : Admin News--}}
                        </br></br>




                        <div class="row">
                            <div class="col-lg-9 col-md-9">
                                <script type="text/javascript" src="../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-635cdf45c2d9fb68"></script>

                                <div class="addthis_inline_share_toolbox"></div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="single-social" style="  background: #3b5998; width: 100%; padding: 10px; text-align: center; ">
                                    <a href="{{route('photo-cart',$news->id)}}" style="color:white;"> প্রিন্ট করুন : <i class="las la-print"></i></a>
                                </div>
                            </div>

                        </div>



                        <div style="margin-top: 20px; border-bottom: 1px solid #ddd; padding: 8px 0px;"> কমেন্ট বক্স </div>

                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="../../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=334182264340964&autoLogAppEvents=1"></script>
                        <div class="fb-comments" data-href="themebazar.xyz/laraflash/74" data-width="100%" data-numposts="5"></div>





                    </div>


                    <!-- Author start -->
                    <div class="author">

                        <div class="author-content">

                            <h6 class="author-caption">
                                <span> প্রতিবেদকের তথ্য  </span>
                            </h6>

                            <div class="author-image">
                                <img src="{{asset($news->reporter->image)}}" alt="{{$news->reporter->name}}">
                            </div>

                            <h1 class="author-name">
                                <a href="reporter/news/%e0%a6%ae%e0%a7%8b.html">{{$news->reporter->name}}</a>
                            </h1>

                            <div class="author-title">
                                <strong><a href="reporter/news/%e0%a6%ae%e0%a7%8b.html"> প্রতিবেদকের সকল নিউজ </a></strong>
                            </div>


                        </div>




                    </div>


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
                                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($relatednews1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$relatednews1->title}}">



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
                                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($latestnews_1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$latestnews_1->title}}">


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




                            <div class="popular-cat">
                                আলোচিত সংবাদ
                            </div>









                            <div class="popular-content"> <!--Popular Content-->
                                <div class="row">



                                    @foreach($popularNews10 as $popularnews)
                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($popularnews->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$popularnews->title}}">



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
