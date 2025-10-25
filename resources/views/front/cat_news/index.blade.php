@extends('master.front.master')
@section('title')
{{$category->description}}
@endsection

@section('body')

    <div class="archive-page2">
        <div class="container">


            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="rachive-info-cats">
                        <a href="{{route('home')}}"><i class="las la-home"> </i> </a>  <i class="las la-angle-right"></i> {{$category->name}}
                    </div>

                    <div class="archivePage-content2">
                        <div class="row">

                            @foreach($cat_newses as $cat_news)
                            <div class="themesBazar-3 themesBazar-m2">
                                <div class="archivePage-wrpp2">
                                    <div class="archive2-image">
                                        <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($cat_news->image)}}" alt="{{$cat_news->title}}" title="{{$cat_news->title}}">

                                    </div>
                                    <h4 class="archivePage2-title">
                                        <a href="{{route('news-detail',[$cat_news->id,$cat_news->slug])}}">{{$cat_news->title}} </a>
                                    </h4>

                                    <div class="archive-meta2">
                                        <a href="#"><i class="las la-tags"> </i>  ৩ বছর আগে
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                            <div style="text-align: center; margin:20px; display:display: ruby;">  </div>





                        </div>







                    </div>

                </div>


                <div class="col-lg-4 col-md-4">
                    <div class="sitebar-fixd" style="position: sticky; top: 0;"><!-- Fixd Siteber -->





                        <div class="archivePopular">
                            <ul class="nav nav-pills" id="archivePopular-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active"  data-bs-toggle="pill" data-bs-target="#archiveTab_recent" role="tab" aria-controls="archiveRecent" aria-selected="false"> সর্বশেষ সংবাদ </div>
                                </li>


                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular" role="tab" aria-controls="archivePopulars" aria-selected="false"> আলোচিত সংবাদ </div>
                                </li>




                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContentarchive">
                            <div class="tab-pane active show  fade" id="archiveTab_recent" role="tabpanel" aria-labelledby="archiveRecent">
                                <div class="archiveTab-sibearNews">





                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bd9b6a47465.jpg" alt="৫ ধরনের ছুটির সুবিধাসহ আর্থিক প্রতিষ্ঠানে চাকরির সুযোগ" title="৫ ধরনের ছুটির সুবিধাসহ আর্থিক প্রতিষ্ঠানে চাকরির সুযোগ">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../137.html"> ৫ ধরনের ছুটির সুবিধাসহ আর্থিক প্রতিষ্ঠানে চাকরির সুযোগ </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbcb42b1065.jpg" alt="এক্সিকিউটিভ মোটরস বাংলাদেশে আনলো ‘বিএমডব্লিউ এক্স সেভেন’" title="এক্সিকিউটিভ মোটরস বাংলাদেশে আনলো ‘বিএমডব্লিউ এক্স সেভেন’">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../136.html"> এক্সিকিউটিভ মোটরস বাংলাদেশে আনলো ‘বিএমডব্লিউ এক্স সেভেন’ </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ২

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbca81ecd92.jpg" alt="শুরু হয়েছে শীতের মৌসুম, শীতের ফুলে রঙিন প্রকৃতি" title="শুরু হয়েছে শীতের মৌসুম, শীতের ফুলে রঙিন প্রকৃতি">
                                        </div>
                                        <a href="../../135.html" class="archiveTab-icon2"><i class="la la-play"></i></a>

                                        <h4 class="archiveTab_hadding"><a href="../../135.html"> শুরু হয়েছে শীতের মৌসুম, শীতের ফুলে রঙিন প্রকৃতি </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৩

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc9d3dd206.jpg" alt="সীমান্ত থেকে ১৭ ছাগল নিয়ে গেল বিএসএফ, অতঃপর..." title="সীমান্ত থেকে ১৭ ছাগল নিয়ে গেল বিএসএফ, অতঃপর...">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../134.html"> সীমান্ত থেকে ১৭ ছাগল নিয়ে গেল বিএসএফ, অতঃপর... </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৪

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc67cb9310.jpg" alt="সৌদিতে মঙ্গলবার পর্যন্ত ঝরবে বৃষ্টি, ক্লাস অনলাইনে" title="সৌদিতে মঙ্গলবার পর্যন্ত ঝরবে বৃষ্টি, ক্লাস অনলাইনে">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../133.html"> সৌদিতে মঙ্গলবার পর্যন্ত ঝরবে বৃষ্টি, ক্লাস অনলাইনে </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৫

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc492b2e27.jpg" alt="রিহ্যাব ফেয়ারে পদ্মা ব্যাংকের বিশেষ গৃহঋণ সেবা" title="রিহ্যাব ফেয়ারে পদ্মা ব্যাংকের বিশেষ গৃহঋণ সেবা">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../132.html"> রিহ্যাব ফেয়ারে পদ্মা ব্যাংকের বিশেষ গৃহঋণ সেবা </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৬

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc4508c1fc.jpg" alt="সিলেট স্ট্রাইকার্সের সাথে এক্স-সিরামিকস" title="সিলেট স্ট্রাইকার্সের সাথে এক্স-সিরামিকস">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../131.html"> সিলেট স্ট্রাইকার্সের সাথে এক্স-সিরামিকস </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৭

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc423de7a7.jpg" alt="দেশব্যাপী পালিত হলো টোটাল ফিটনেস ডে" title="দেশব্যাপী পালিত হলো টোটাল ফিটনেস ডে">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../130.html"> দেশব্যাপী পালিত হলো টোটাল ফিটনেস ডে </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৮

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc3f221d50.jpg" alt="সৃষ্টিশীল কাজে পৃষ্ঠপোষকতা বাড়াতে হবে: সমাজকল্যাণমন্ত্রী" title="সৃষ্টিশীল কাজে পৃষ্ঠপোষকতা বাড়াতে হবে: সমাজকল্যাণমন্ত্রী">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../129.html"> সৃষ্টিশীল কাজে পৃষ্ঠপোষকতা বাড়াতে হবে: সমাজকল্যাণমন্ত্রী </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৯

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc3c8d149a.jpg" alt="ওটিএ ও আইসিএ অ্যাসোসিয়েশনের কেন্দ্রীয় কার্যনির্বাহী পরিষদের নতুন কমিটি ঘোষণা" title="ওটিএ ও আইসিএ অ্যাসোসিয়েশনের কেন্দ্রীয় কার্যনির্বাহী পরিষদের নতুন কমিটি ঘোষণা">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../128.html"> ওটিএ ও আইসিএ অ্যাসোসিয়েশনের কেন্দ্রীয় কার্যনির্বাহী পরিষদের নতুন কমিটি ঘোষণা </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১০

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc38997946.jpg" alt="ইতালিতে ভুয়া ‘রেসিডেন্স পারমিট’ বানানোর অভিযোগে বাংলাদেশিসহ আটক ৭" title="ইতালিতে ভুয়া ‘রেসিডেন্স পারমিট’ বানানোর অভিযোগে বাংলাদেশিসহ আটক ৭">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../127.html"> ইতালিতে ভুয়া ‘রেসিডেন্স পারমিট’ বানানোর অভিযোগে বাংলাদেশিসহ আটক ৭ </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১১

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc35e0ad29.jpg" alt="আফ্রিকায় মরুভূমি পাড়ি দিতে গিয়ে পিপাসায় মারা গেল ২৭ অভিবাসী " title="আফ্রিকায় মরুভূমি পাড়ি দিতে গিয়ে পিপাসায় মারা গেল ২৭ অভিবাসী ">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../126.html"> আফ্রিকায় মরুভূমি পাড়ি দিতে গিয়ে পিপাসায় মারা গেল ২৭ অভিবাসী  </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১২

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc32e0f816.jpg" alt="বিদেশগামীদের ফিঙ্গারপ্রিন্ট গ্রহণ ও সরবরাহ করছে সিআইডি" title="বিদেশগামীদের ফিঙ্গারপ্রিন্ট গ্রহণ ও সরবরাহ করছে সিআইডি">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../125.html"> বিদেশগামীদের ফিঙ্গারপ্রিন্ট গ্রহণ ও সরবরাহ করছে সিআইডি </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৩

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc3038cf7d.jpg" alt="আবুধাবিতে লটারিতে ১০৫ কোটি টাকা জিতলেন বাংলাদেশি গাড়িচালক" title="আবুধাবিতে লটারিতে ১০৫ কোটি টাকা জিতলেন বাংলাদেশি গাড়িচালক">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../124.html"> আবুধাবিতে লটারিতে ১০৫ কোটি টাকা জিতলেন বাংলাদেশি গাড়িচালক </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৪

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc2d70a70d.jpg" alt="সীমা হামিদকে সম্মানসূচক ডক্টরেট ডিগ্রি প্রদান করল ডব্লিউইউএলএম" title="সীমা হামিদকে সম্মানসূচক ডক্টরেট ডিগ্রি প্রদান করল ডব্লিউইউএলএম">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../123.html"> সীমা হামিদকে সম্মানসূচক ডক্টরেট ডিগ্রি প্রদান করল ডব্লিউইউএলএম </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৫

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc26d3a8d5.jpg" alt="সিএসইর শরিয়াহ সূচকে ২ কেম্পানি যুক্ত হলো , বাদ পড়ল ৪টি" title="সিএসইর শরিয়াহ সূচকে ২ কেম্পানি যুক্ত হলো , বাদ পড়ল ৪টি">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../122.html"> সিএসইর শরিয়াহ সূচকে ২ কেম্পানি যুক্ত হলো , বাদ পড়ল ৪টি </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৬

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc24494ab9.jpg" alt="সূচকের উঠা-নামায় লেনদেন চলছে" title="সূচকের উঠা-নামায় লেনদেন চলছে">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../121.html"> সূচকের উঠা-নামায় লেনদেন চলছে </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৭

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc21684271.jpeg" alt="এশিয়াটিক ল্যাবরেটরিজের আইপিওতে আবেদন শুরু ১৬ জানুয়ারি" title="এশিয়াটিক ল্যাবরেটরিজের আইপিওতে আবেদন শুরু ১৬ জানুয়ারি">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../120.html"> এশিয়াটিক ল্যাবরেটরিজের আইপিওতে আবেদন শুরু ১৬ জানুয়ারি </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৮

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc1eca8df4.jpg" alt="ইন্টারন্যাশনাল লিজিংয়ের তৃতীয় প্রান্তিক প্রকাশ" title="ইন্টারন্যাশনাল লিজিংয়ের তৃতীয় প্রান্তিক প্রকাশ">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../119.html"> ইন্টারন্যাশনাল লিজিংয়ের তৃতীয় প্রান্তিক প্রকাশ </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৯

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc1bebc9ae.jpg" alt="নগদ লভ্যাংশ পাঠিয়েছে ২ কোম্পানি" title="নগদ লভ্যাংশ পাঠিয়েছে ২ কোম্পানি">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../118.html"> নগদ লভ্যাংশ পাঠিয়েছে ২ কোম্পানি </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ২০

                                        </div>


                                    </div>



                                </div>




                            </div>


                            <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel" aria-labelledby="archivePopulars">
                                <div class="archiveTab-sibearNews">






                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63baba537dcdd.jpg" alt="ছাত্রলীগের সেই মঞ্চে পা ভেঙেছেন যুব মহিলা লীগের নেত্রী" title="ছাত্রলীগের সেই মঞ্চে পা ভেঙেছেন যুব মহিলা লীগের নেত্রী">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../9.html"> ছাত্রলীগের সেই মঞ্চে পা ভেঙেছেন যুব মহিলা লীগের নেত্রী </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc4508c1fc.jpg" alt="সিলেট স্ট্রাইকার্সের সাথে এক্স-সিরামিকস" title="সিলেট স্ট্রাইকার্সের সাথে এক্স-সিরামিকস">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../131.html"> সিলেট স্ট্রাইকার্সের সাথে এক্স-সিরামিকস </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ২

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63babefc928e2.jpg" alt="সাংসারিক গোলযোগের মাঝে যে কারণে দুবাই যাচ্ছেন রাজ-পরীমণি" title="সাংসারিক গোলযোগের মাঝে যে কারণে দুবাই যাচ্ছেন রাজ-পরীমণি">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../28.html"> সাংসারিক গোলযোগের মাঝে যে কারণে দুবাই যাচ্ছেন রাজ-পরীমণি </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৩

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc3c8d149a.jpg" alt="ওটিএ ও আইসিএ অ্যাসোসিয়েশনের কেন্দ্রীয় কার্যনির্বাহী পরিষদের নতুন কমিটি ঘোষণা" title="ওটিএ ও আইসিএ অ্যাসোসিয়েশনের কেন্দ্রীয় কার্যনির্বাহী পরিষদের নতুন কমিটি ঘোষণা">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../128.html"> ওটিএ ও আইসিএ অ্যাসোসিয়েশনের কেন্দ্রীয় কার্যনির্বাহী পরিষদের নতুন কমিটি ঘোষণা </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৪

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bada6e82e4b.jpg" alt="জেনে নিন বিশ্ব ইজতেমার জেলাভিত্তিক খিত্তার তালিকা" title="জেনে নিন বিশ্ব ইজতেমার জেলাভিত্তিক খিত্তার তালিকা">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../39.html"> জেনে নিন বিশ্ব ইজতেমার জেলাভিত্তিক খিত্তার তালিকা </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৫

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbaff425fcb.jpg" alt="গুচ্ছ পদ্ধতিতে ভর্তি, প্রথম অবস্থানে বেগম রোকেয়া বিশ্ববিদ্যালয়" title="গুচ্ছ পদ্ধতিতে ভর্তি, প্রথম অবস্থানে বেগম রোকেয়া বিশ্ববিদ্যালয়">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../52.html"> গুচ্ছ পদ্ধতিতে ভর্তি, প্রথম অবস্থানে বেগম রোকেয়া বিশ্ববিদ্যালয় </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৬

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bac15d2709b.jpg" alt="সুইচ চাপলেই বদলে যাবে গাড়ির রং " title="সুইচ চাপলেই বদলে যাবে গাড়ির রং ">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../35.html"> সুইচ চাপলেই বদলে যাবে গাড়ির রং  </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৭

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63babd3dec05c.jpg" alt="অবশেষে জানা গেলো, সৌদি আরবে কবে অভিষেক হচ্ছে রোনালদোর" title="অবশেষে জানা গেলো, সৌদি আরবে কবে অভিষেক হচ্ছে রোনালদোর">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../21.html"> অবশেষে জানা গেলো, সৌদি আরবে কবে অভিষেক হচ্ছে রোনালদোর </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৮

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc38997946.jpg" alt="ইতালিতে ভুয়া ‘রেসিডেন্স পারমিট’ বানানোর অভিযোগে বাংলাদেশিসহ আটক ৭" title="ইতালিতে ভুয়া ‘রেসিডেন্স পারমিট’ বানানোর অভিযোগে বাংলাদেশিসহ আটক ৭">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../127.html"> ইতালিতে ভুয়া ‘রেসিডেন্স পারমিট’ বানানোর অভিযোগে বাংলাদেশিসহ আটক ৭ </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ৯

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbea465c94.jpg" alt="খুলনা বিশ্ববিদ্যালয়: স্বতন্ত্র বৈশিষ্ট্যে সমুজ্জ্বল " title="খুলনা বিশ্ববিদ্যালয়: স্বতন্ত্র বৈশিষ্ট্যে সমুজ্জ্বল ">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../107.html"> খুলনা বিশ্ববিদ্যালয়: স্বতন্ত্র বৈশিষ্ট্যে সমুজ্জ্বল  </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১০

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc423de7a7.jpg" alt="দেশব্যাপী পালিত হলো টোটাল ফিটনেস ডে" title="দেশব্যাপী পালিত হলো টোটাল ফিটনেস ডে">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../130.html"> দেশব্যাপী পালিত হলো টোটাল ফিটনেস ডে </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১১

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bac194816f6.jpg" alt="৫ মিনিটের চার্জে কথা বলা যাবে প্রায় ৩ ঘণ্টা" title="৫ মিনিটের চার্জে কথা বলা যাবে প্রায় ৩ ঘণ্টা">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../36.html"> ৫ মিনিটের চার্জে কথা বলা যাবে প্রায় ৩ ঘণ্টা </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১২

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63babdb5775a7.jpg" alt="রেকর্ড পাঁচবার বর্ষসেরা প্লেমেকার অ্যাওয়ার্ড জিতলেন মেসি" title="রেকর্ড পাঁচবার বর্ষসেরা প্লেমেকার অ্যাওয়ার্ড জিতলেন মেসি">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../23.html"> রেকর্ড পাঁচবার বর্ষসেরা প্লেমেকার অ্যাওয়ার্ড জিতলেন মেসি </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৩

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbc08961ebb.jpg" alt="যুক্তরাজ্যভিত্তিক গ্লোবাল ব্র্যান্ডস ম্যাগাজিন পুরস্কার ২০২২ জিতল ‘নগদ’" title="যুক্তরাজ্যভিত্তিক গ্লোবাল ব্র্যান্ডস ম্যাগাজিন পুরস্কার ২০২২ জিতল ‘নগদ’">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../115.html"> যুক্তরাজ্যভিত্তিক গ্লোবাল ব্র্যান্ডস ম্যাগাজিন পুরস্কার ২০২২ জিতল ‘নগদ’ </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৪

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbb69f1f47.jpg" alt="৪ মেডিকেলের পরিচালক পদে বদলি" title="৪ মেডিকেলের পরিচালক পদে বদলি">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../93.html"> ৪ মেডিকেলের পরিচালক পদে বদলি </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৫

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63babadb17989.jpg" alt="দারিদ্রতার কারণে স্কুল থেকে ঝরে পড়া ছাত্রটি এখন টেক্সাসের বিচারক" title="দারিদ্রতার কারণে স্কুল থেকে ঝরে পড়া ছাত্রটি এখন টেক্সাসের বিচারক">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../11.html"> দারিদ্রতার কারণে স্কুল থেকে ঝরে পড়া ছাত্রটি এখন টেক্সাসের বিচারক </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৬

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbaf5691e53.jpg" alt="জবি বিএনসিসি ক্যাডেট ও ল্যান্স কর্পোরাল পদে পদোন্নতি পেলেন ৩৫ শিক্ষার্থী" title="জবি বিএনসিসি ক্যাডেট ও ল্যান্স কর্পোরাল পদে পদোন্নতি পেলেন ৩৫ শিক্ষার্থী">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../49.html"> জবি বিএনসিসি ক্যাডেট ও ল্যান্স কর্পোরাল পদে পদোন্নতি পেলেন ৩৫ শিক্ষার্থী </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৭

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bbbd1a11894.jpg" alt="ওয়াসার এমডির ১৪ বাড়ি: দুদকের অগ্রগতি জানতে চাইলেন হাইকোর্ট (ভিডিও)" title="ওয়াসার এমডির ১৪ বাড়ি: দুদকের অগ্রগতি জানতে চাইলেন হাইকোর্ট (ভিডিও)">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../100.html"> ওয়াসার এমডির ১৪ বাড়ি: দুদকের অগ্রগতি জানতে চাইলেন হাইকোর্ট (ভিডিও) </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৮

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63bab8250346e.jpg" alt="বাংলাদেশের তৈরি পোশাকের বড় বাজার হতে পারে ব্রাজিল : দেশটির রাষ্ট্রদূত" title="বাংলাদেশের তৈরি পোশাকের বড় বাজার হতে পারে ব্রাজিল : দেশটির রাষ্ট্রদূত">
                                        </div>
                                        <a href="../../3.html" class="archiveTab-icon2"><i class="la la-play"></i></a>

                                        <h4 class="archiveTab_hadding"><a href="../../3.html"> বাংলাদেশের তৈরি পোশাকের বড় বাজার হতে পারে ব্রাজিল : দেশটির রাষ্ট্রদূত </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ১৯

                                        </div>


                                    </div>


                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="public/templateimage/63c291b70994e.html" data-src="https://themebazar.xyz/laraflash/public/postimages/63babc6b2f642.jpg" alt="বরিশালের রানের পাহাড় টপকে টানা দ্বিতীয় জয় সিলেটের" title="বরিশালের রানের পাহাড় টপকে টানা দ্বিতীয় জয় সিলেটের">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="../../18.html"> বরিশালের রানের পাহাড় টপকে টানা দ্বিতীয় জয় সিলেটের </a>

                                        </h4>

                                        <div class="archive-conut">
                                            ২০

                                        </div>


                                    </div>




                                </div>




                            </div>

                        </div>


                        <div class="siteber-add2">


                        </div>

                    </div> <!-- Fixd Siteber End -->


                </div>
            </div>
        </div>
    </div>
@endsection
