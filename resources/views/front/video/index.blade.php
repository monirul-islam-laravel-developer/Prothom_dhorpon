@extends('master.front.master')
@section('title')
    ভিডিও গ্যালারী
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

    <section class="videoGallery-page">
        <div class="container">
            <div class="archive-info-cats">
                <a href="{{route('home')}}"><i class="la la-home"> </i> </a>  <i class="la la-chevron-right"></i> ভিডিও গ্যালারী
            </div>

            <div class="video-page-content">
                <div class="row">
                    @foreach($all_videos as $video)
                    <div class="themesBazar-4 themesBazar-m2">
                        <div class="video-page-wrpp">
                            <div class="video-page-image">
                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($video->image)}}">
                                <a href="{{$video->link}}" class="video-pageIcon popup"> <i class="las la-video"></i>  </a>

                            </div>
                            <div class="video-page-title">
                                <a href="{{$video->link}}"> {{$video->title}} </a>
                            </div>

                        </div>
                    </div>
                    @endforeach



                    <div style="text-align: center; display: ruby; margin:20px">  </div>





                </div>





            </div>





        </div>
    </section>

@endsection
