@extends('master.front.master')
@section('title')
    সর্বশেষ সংবাদ
@endsection
@section('og:title')
    সর্বশেষ নিউজ|{{ $webLogo->title ?? config('app.name') }}
@endsection
@section('keyword')
    প্রথম দর্পন,পথম দর্পণ,প্রথম দোর্পণ,প্রথম দর্স্পণ,প্রথম দর্পাণ,প্রথম দরফন,প্রতম দোপণ,prthom dorpon,prthm dorpon,prthom dorpn,prthom dorppon,prothpm dorpon,patham dorpon,pathom darpan,prothom dorpan,প্রথম দর্পণ, বাংলা সংবাদ, অনলাইন নিউজ, বাংলাদেশ খবর, ব্রেকিং নিউজ, সর্বশেষ খবর, আজকের সংবাদ, জাতীয় খবর, আন্তর্জাতিক খবর, রাজনীতি সংবাদ, অর্থনীতি সংবাদ, খেলাধুলা খবর, বিনোদন খবর, প্রযুক্তি সংবাদ
    দুর্নীতি খবর, পুলিশ সংবাদ, আদালত সংবাদ,দুর্ঘটনা খবর,আবহাওয়া খবর,শিক্ষা সংবাদ,স্বাস্থ্য সংবাদ,কৃষি সংবাদ,লাইফস্টাইল খবর,ধর্মীয় খবর,পরামর্শ,রিভিউ নিউজ,মতামত কলাম
    বাংলাদেশ লাইভ নিউজ,ভাইরাল নিউজ,ব্রেকিং নিউজ আপডেট,অনলাইন নিউজ ২৪,তাজা খবর,বাংলা নিউজ আজ,দ্রুত খবর,বাংলা অনলাইন মিডিয়া,সংবাদ আপডেট,
    prothomdorpan.com,prothomdorpan,prothom dorpan
@endsection


@section('og:description')
    সর্বশেষ নিউজ|{{ $webLogo->title ?? config('app.name') }}
@endsection

@section('og:image')
    {{ asset(($webLogo->lazyload_logo ?? 'frontend/images/og-default.jpg') . '?v=' . time()) }}
@endsection

@section('body')

    <section class="date-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">




                    <div class="date-page-content">

                        <div class="archive-info-cats">
                            <a href="{{route('home')}}"><i class="la la-home"> </i> </a>  <i class="la la-chevron-right"></i> সর্বশেষ সংবাদ
                        </div>

                        <div class="row">


                            @foreach($all_latestnewses as $latest_news)
                            <div class="custom-col4">
                                <div class="date-page-wrpp">
                                    <div class="date-image">
                                        <a href="{{route('news-detail',[$latest_news->id])}}"><img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($latest_news->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$latest_news->title}}"></a>



                                    </div>
                                    <h4 class="datePage-title">
                                        <a href="{{route('news-detail',[$latest_news->id])}}">{{$latest_news->title}}</a>
                                    </h4>

                                    <div class="date-meta">
                                        <a href="#"><i class="las la-tags"> </i>  {{ \Carbon\Carbon::parse($latest_news->created_at)->locale('bn')->bnDiffForHumans() }}
                                        </a>
                                    </div>

                                </div>

                            </div>
                            @endforeach



                                <div class="d-flex justify-content-center mt-2 mb-2 pt-2 pb-2 border-top">
                                    {{ $all_latestnewses->links('pagination::bootstrap-5') }}
                                </div>






                    </div>



                </div>
            </div>
        </div>
    </section>


@endsection
