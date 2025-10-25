@extends('master.front.master')
@section('title')
    {{$news->title}}
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
                                    <li><a href="https://themebazar.xyz/laraflash"> <i class="las la-home"></i> প্রচ্ছদ </a> <i class="las la-angle-double-right"></i></li>
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
                                <li>  <a href="#"> <img src="{{asset($news->reporter->image)}}" alt="">{{$news->reporter->name}},{{$news->reporter->designation}}</a> </li>
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


                                <li>
                                    <i class="lar la-clock"></i>
                                    আপডেট সময় :
                                    @if(isset($news->updated_at) && $news->updated_at)
                                        @php
                                            $date = \Carbon\Carbon::parse($news->updated_at)
                                                ->timezone('Asia/Dhaka')   // Bangladesh Time
                                                ->locale('bn');

                                            $formatted = $date->translatedFormat('d F Y, h:i A');

                                            // ইংরেজি → বাংলা রূপান্তর
                                            $english = ['0','1','2','3','4','5','৬','৭','৮','৯','AM','PM'];
                                            $bangla  = ['০','১','২','৩','৪','৫','৬','৭','৮','৯','পূর্বাহ্ণ','অপরাহ্ণ'];

                                            echo str_replace($english, $bangla, $formatted);
                                        @endphp
                                    @else
                                        — কোন আপডেট নেই —
                                    @endif
                                </li>


                            </ul>

                        </div>
                        <div class="single-image2">
                            <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbb5339bea8.jpg" alt="রাজকীয় ঢঙে নাতি-নাতনিকে বরণ, ৩০০ কেজি স্বর্ণ দান করবেন আম্বানি" title="রাজকীয় ঢঙে নাতি-নাতনিকে বরণ, ৩০০ কেজি স্বর্ণ দান করবেন আম্বানি" width="100%" height="auto">
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
                                    <a href="post/print/74.html" style="color:white;" target="_blank"> প্রিন্ট করুন : <i class="las la-print"></i></a>
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
                                <img src="{{asset($news->reporter->image)}}" alt="মো. হেলাল উদ্দিন ">
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


                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="related-news-wrpp2"> <!--Related Wrpp start-->
                                            <div class="relatedImage2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbb5339bea8.jpg" alt="রাজকীয় ঢঙে নাতি-নাতনিকে বরণ, ৩০০ কেজি স্বর্ণ দান করবেন আম্বানি" title="রাজকীয় ঢঙে নাতি-নাতনিকে বরণ, ৩০০ কেজি স্বর্ণ দান করবেন আম্বানি">



                                            </div>
                                            <h4 class="relatedTitle2"><a href="74.html"> রাজকীয় ঢঙে নাতি-নাতনিকে বরণ, ৩০০ কেজি স্বর্ণ দান করবেন আম্বানি  </a></h4>

                                        </div> <!--Related Wrpp End-->
                                    </div>

                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="related-news-wrpp2"> <!--Related Wrpp start-->
                                            <div class="relatedImage2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63badad824121.jpg" alt="বাংলাদেশের অর্থনৈতিক প্রবৃদ্ধি অগ্রগতির প্রশংসা করলেন বাইডেন" title="বাংলাদেশের অর্থনৈতিক প্রবৃদ্ধি অগ্রগতির প্রশংসা করলেন বাইডেন">



                                            </div>
                                            <h4 class="relatedTitle2"><a href="40.html"> বাংলাদেশের অর্থনৈতিক প্রবৃদ্ধি অগ্রগতির প্রশংসা করলেন বাইডেন  </a></h4>

                                        </div> <!--Related Wrpp End-->
                                    </div>

                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="related-news-wrpp2"> <!--Related Wrpp start-->
                                            <div class="relatedImage2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bada6e82e4b.jpg" alt="জেনে নিন বিশ্ব ইজতেমার জেলাভিত্তিক খিত্তার তালিকা" title="জেনে নিন বিশ্ব ইজতেমার জেলাভিত্তিক খিত্তার তালিকা">



                                            </div>
                                            <h4 class="relatedTitle2"><a href="39.html"> জেনে নিন বিশ্ব ইজতেমার জেলাভিত্তিক খিত্তার তালিকা  </a></h4>

                                        </div> <!--Related Wrpp End-->
                                    </div>

                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="related-news-wrpp2"> <!--Related Wrpp start-->
                                            <div class="relatedImage2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bada001ff80.jpg" alt="জনগণ বিচার করবে ১৪ বছরে আ. লীগ কী দিয়েছে : প্রধানমন্ত্রী" title="জনগণ বিচার করবে ১৪ বছরে আ. লীগ কী দিয়েছে : প্রধানমন্ত্রী">



                                            </div>
                                            <h4 class="relatedTitle2"><a href="38.html"> জনগণ বিচার করবে ১৪ বছরে আ. লীগ কী দিয়েছে : প্রধানমন্ত্রী  </a></h4>

                                        </div> <!--Related Wrpp End-->
                                    </div>

                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="related-news-wrpp2"> <!--Related Wrpp start-->
                                            <div class="relatedImage2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bad954ae321.jpg" alt="ঘন কুয়াশায় শাহজালাল বিমানবন্দরে ফ্লাইট বন্ধ, সাতটি বিমান গিয়ে নামল কলকাতায়" title="ঘন কুয়াশায় শাহজালাল বিমানবন্দরে ফ্লাইট বন্ধ, সাতটি বিমান গিয়ে নামল কলকাতায়">



                                            </div>
                                            <h4 class="relatedTitle2"><a href="37.html"> ঘন কুয়াশায় শাহজালাল বিমানবন্দরে ফ্লাইট বন্ধ, সাতটি বিমান গিয়ে নামল কলকাতায়  </a></h4>

                                        </div> <!--Related Wrpp End-->
                                    </div>

                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="related-news-wrpp2"> <!--Related Wrpp start-->
                                            <div class="relatedImage2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bab953b2686.jpg" alt="আগামী জাতীয় সংসদ নির্বাচন ইভিএম না ব্যালট, জানালো ইসি" title="আগামী জাতীয় সংসদ নির্বাচন ইভিএম না ব্যালট, জানালো ইসি">

                                                <a href="5.html" class="single2-rIcon"><i class="la la-play"></i></a>

                                            </div>
                                            <h4 class="relatedTitle2"><a href="5.html"> আগামী জাতীয় সংসদ নির্বাচন ইভিএম না ব্যালট, জানালো ইসি  </a></h4>

                                        </div> <!--Related Wrpp End-->
                                    </div>



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


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bd9b6a47465.jpg" alt="৫ ধরনের ছুটির সুবিধাসহ আর্থিক প্রতিষ্ঠানে চাকরির সুযোগ" title="৫ ধরনের ছুটির সুবিধাসহ আর্থিক প্রতিষ্ঠানে চাকরির সুযোগ">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="137.html"> ৫ ধরনের ছুটির সুবিধাসহ আর্থিক প্রতিষ্ঠানে চাকরির সুযোগ  </a></h4>
                                        </div>
                                    </div>


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbcb42b1065.jpg" alt="এক্সিকিউটিভ মোটরস বাংলাদেশে আনলো ‘বিএমডব্লিউ এক্স সেভেন’" title="এক্সিকিউটিভ মোটরস বাংলাদেশে আনলো ‘বিএমডব্লিউ এক্স সেভেন’">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="136.html"> এক্সিকিউটিভ মোটরস বাংলাদেশে আনলো ‘বিএমডব্লিউ এক্স সেভেন’  </a></h4>
                                        </div>
                                    </div>


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbca81ecd92.jpg" alt="শুরু হয়েছে শীতের মৌসুম, শীতের ফুলে রঙিন প্রকৃতি" title="শুরু হয়েছে শীতের মৌসুম, শীতের ফুলে রঙিন প্রকৃতি">
                                                <a href="135.html" class="single2-siteIcon"><i class="la la-play"></i></a>

                                            </div>
                                            <h4 class="leftSitbe-title"><a href="135.html"> শুরু হয়েছে শীতের মৌসুম, শীতের ফুলে রঙিন প্রকৃতি  </a></h4>
                                        </div>
                                    </div>


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc9d3dd206.jpg" alt="সীমান্ত থেকে ১৭ ছাগল নিয়ে গেল বিএসএফ, অতঃপর..." title="সীমান্ত থেকে ১৭ ছাগল নিয়ে গেল বিএসএফ, অতঃপর...">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="134.html"> সীমান্ত থেকে ১৭ ছাগল নিয়ে গেল বিএসএফ, অতঃপর...  </a></h4>
                                        </div>
                                    </div>


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc67cb9310.jpg" alt="সৌদিতে মঙ্গলবার পর্যন্ত ঝরবে বৃষ্টি, ক্লাস অনলাইনে" title="সৌদিতে মঙ্গলবার পর্যন্ত ঝরবে বৃষ্টি, ক্লাস অনলাইনে">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="133.html"> সৌদিতে মঙ্গলবার পর্যন্ত ঝরবে বৃষ্টি, ক্লাস অনলাইনে  </a></h4>
                                        </div>
                                    </div>


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc492b2e27.jpg" alt="রিহ্যাব ফেয়ারে পদ্মা ব্যাংকের বিশেষ গৃহঋণ সেবা" title="রিহ্যাব ফেয়ারে পদ্মা ব্যাংকের বিশেষ গৃহঋণ সেবা">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="132.html"> রিহ্যাব ফেয়ারে পদ্মা ব্যাংকের বিশেষ গৃহঋণ সেবা  </a></h4>
                                        </div>
                                    </div>


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc4508c1fc.jpg" alt="সিলেট স্ট্রাইকার্সের সাথে এক্স-সিরামিকস" title="সিলেট স্ট্রাইকার্সের সাথে এক্স-সিরামিকস">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="131.html"> সিলেট স্ট্রাইকার্সের সাথে এক্স-সিরামিকস  </a></h4>
                                        </div>
                                    </div>


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc423de7a7.jpg" alt="দেশব্যাপী পালিত হলো টোটাল ফিটনেস ডে" title="দেশব্যাপী পালিত হলো টোটাল ফিটনেস ডে">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="130.html"> দেশব্যাপী পালিত হলো টোটাল ফিটনেস ডে  </a></h4>
                                        </div>
                                    </div>


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc3f221d50.jpg" alt="সৃষ্টিশীল কাজে পৃষ্ঠপোষকতা বাড়াতে হবে: সমাজকল্যাণমন্ত্রী" title="সৃষ্টিশীল কাজে পৃষ্ঠপোষকতা বাড়াতে হবে: সমাজকল্যাণমন্ত্রী">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="129.html"> সৃষ্টিশীল কাজে পৃষ্ঠপোষকতা বাড়াতে হবে: সমাজকল্যাণমন্ত্রী  </a></h4>
                                        </div>
                                    </div>


                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc3c8d149a.jpg" alt="ওটিএ ও আইসিএ অ্যাসোসিয়েশনের কেন্দ্রীয় কার্যনির্বাহী পরিষদের নতুন কমিটি ঘোষণা" title="ওটিএ ও আইসিএ অ্যাসোসিয়েশনের কেন্দ্রীয় কার্যনির্বাহী পরিষদের নতুন কমিটি ঘোষণা">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="128.html"> ওটিএ ও আইসিএ অ্যাসোসিয়েশনের কেন্দ্রীয় কার্যনির্বাহী পরিষদের নতুন কমিটি ঘোষণা  </a></h4>
                                        </div>
                                    </div>



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





                            <div class="rightSitbear-image">
                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbca81ecd92.jpg" alt="শুরু হয়েছে শীতের মৌসুম, শীতের ফুলে রঙিন প্রকৃতি" title="শুরু হয়েছে শীতের মৌসুম, শীতের ফুলে রঙিন প্রকৃতি">

                                <a href="135.html" class="single2-siteIcon"><i class="la la-play"></i></a>

                            </div>
                            <h4 class="rSitebar-title"><a href="135.html"> শুরু হয়েছে শীতের মৌসুম, শীতের ফুলে রঙিন প্রকৃতি  </a></h4>



                            <div class="popular-content"> <!--Popular Content-->
                                <div class="row">



                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbd881f6a1.jpg" alt="ম্যুরালে বঙ্গবন্ধু ও প্রধানমন্ত্রীর সঙ্গে কারও ছবি নয়: হাইকোর্ট" title="ম্যুরালে বঙ্গবন্ধু ও প্রধানমন্ত্রীর সঙ্গে কারও ছবি নয়: হাইকোর্ট">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="102.html"> ম্যুরালে বঙ্গবন্ধু ও প্রধানমন্ত্রীর সঙ্গে কারও ছবি নয়: হাইকোর্ট  </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>

                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbbb0da336.jpg" alt="করোনায় মৃত্যুহীন দিনে শনাক্ত ১৭" title="করোনায় মৃত্যুহীন দিনে শনাক্ত ১৭">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="94.html"> করোনায় মৃত্যুহীন দিনে শনাক্ত ১৭  </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>

                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbb815c3e20.jpg" alt="সঙ্গীকে নিয়ে মালদ্বীপ ভ্রমণে যে ভুল করলেই বিপদে পড়বেন" title="সঙ্গীকে নিয়ে মালদ্বীপ ভ্রমণে যে ভুল করলেই বিপদে পড়বেন">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="84.html"> সঙ্গীকে নিয়ে মালদ্বীপ ভ্রমণে যে ভুল করলেই বিপদে পড়বেন  </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>

                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbb6805b95d.jpg" alt="শীতে কলা খাওয়া কি সর্দি-কাশির জন্য ক্ষতিকর?" title="শীতে কলা খাওয়া কি সর্দি-কাশির জন্য ক্ষতিকর?">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="80.html"> শীতে কলা খাওয়া কি সর্দি-কাশির জন্য ক্ষতিকর?  </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>

                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbb5d1c8b70.jpg" alt="বিশ্বে প্রথম কৃত্রিম গর্ভের সুবিধা, থাকছে সন্তানের উচ্চতা ও বুদ্ধিমত্তা নির্ধারণের সুবিধা " title="বিশ্বে প্রথম কৃত্রিম গর্ভের সুবিধা, থাকছে সন্তানের উচ্চতা ও বুদ্ধিমত্তা নির্ধারণের সুবিধা ">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="77.html"> বিশ্বে প্রথম কৃত্রিম গর্ভের সুবিধা, থাকছে সন্তানের উচ্চতা ও বুদ্ধিমত্তা নির্ধারণের সুবিধা   </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>

                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbb3bea6415.jpg" alt="কয়জন বাংলাদেশি হজে যেতে পারবেন, জানা যাবে ৯ জানুয়ারি " title="কয়জন বাংলাদেশি হজে যেতে পারবেন, জানা যাবে ৯ জানুয়ারি ">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="67.html"> কয়জন বাংলাদেশি হজে যেতে পারবেন, জানা যাবে ৯ জানুয়ারি   </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>

                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbaf9ad4100.jpg" alt="জাবিতে ভূতাত্ত্বিক বিজ্ঞান বিভাগের যৌথ গবেষণা" title="জাবিতে ভূতাত্ত্বিক বিজ্ঞান বিভাগের যৌথ গবেষণা">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="50.html"> জাবিতে ভূতাত্ত্বিক বিজ্ঞান বিভাগের যৌথ গবেষণা  </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>

                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbad999f772.jpg" alt="বড় ভাইয়ের সঙ্গে ঝগড়া করে বিষপানে ছোট ভাইয়ের মৃত্যু" title="বড় ভাইয়ের সঙ্গে ঝগড়া করে বিষপানে ছোট ভাইয়ের মৃত্যু">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="43.html"> বড় ভাইয়ের সঙ্গে ঝগড়া করে বিষপানে ছোট ভাইয়ের মৃত্যু  </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>

                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bab8250346e.jpg" alt="বাংলাদেশের তৈরি পোশাকের বড় বাজার হতে পারে ব্রাজিল : দেশটির রাষ্ট্রদূত" title="বাংলাদেশের তৈরি পোশাকের বড় বাজার হতে পারে ব্রাজিল : দেশটির রাষ্ট্রদূত">

                                                <a href="3.html" class="single2-siteIcon"><i class="la la-play"></i></a>

                                            </div>
                                            <h4 class="rSitebar-title2"><a href="3.html"> বাংলাদেশের তৈরি পোশাকের বড় বাজার হতে পারে ব্রাজিল : দেশটির রাষ্ট্রদূত  </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>

                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="public/templateimage/63c291b70994e.jpg" data-src="https://themebazar.xyz/laraflash/public/postimages/63bab7f534bcd.jpg" alt="বাংলাদেশের পাসপোর্টের মান অনেক বেড়েছে: পররাষ্ট্রমন্ত্রী" title="বাংলাদেশের পাসপোর্টের মান অনেক বেড়েছে: পররাষ্ট্রমন্ত্রী">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="2.html"> বাংলাদেশের পাসপোর্টের মান অনেক বেড়েছে: পররাষ্ট্রমন্ত্রী  </a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>


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
