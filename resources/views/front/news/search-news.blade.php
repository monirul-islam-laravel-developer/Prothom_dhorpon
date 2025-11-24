@extends('master.front.master')
@section('title')
  অনুসন্ধান
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

    <div class="archive-page2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="rachive-info-cats">
                        <a href="{{route('home')}}"><i class="las la-home"> </i> </a>
                    </div>
                    <div class="archivePage-content2">

                        <div class="row">
                            @if($search_newes->isEmpty())
                                <div class="themesBazar-3 themesBazar-m2">
                                    <p>No news found.</p>
                                </div>
                            @else
                                @foreach($search_newes as $news)
                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="archivePage-wrpp2">
                                            <div class="archive2-image">
                                                <a href="{{ route('news-detail', ['id' => $news->id]) }}">
                                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{ asset($news->image) }}" alt="{{ $news->title }}" title="{{ $news->title }}">
                                                </a>
                                            </div>
                                            <h4 class="archivePage2-title">
                                                <a href="{{ route('news-detail', ['id' => $news->id]) }}">{{ \Illuminate\Support\Str::limit($news->title, 80, '') }}</a>
                                            </h4>

{{--                                            <div class="archive-meta2">--}}
{{--                                                {{ \Carbon\Carbon::parse($latest_news->created_at)->locale('bn')->bnDiffForHumans() }}--}}
{{--                                                <a href="{{ route('news-detail', ['id' => $news->id, 'slug' => $news->slug]) }}"><i class="las la-tags"></i> {{ $diff_for_humans_bn }}</a>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{-- Pagination --}}
                            {{-- {{ $news->links('pagination::bootstrap-4', ['prev_text' => 'Previous', 'next_text' => 'Next']) }} --}}
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
                                    @foreach($latestnews_20 as $recent_news_single)
                                        <div class="archive-tabWrpp archiveTab-border">
                                            <div class="archiveTab-image ">
                                                <a href="{{route('news-detail',['id' => $recent_news_single->id])}}">
                                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($recent_news_single->image)}}" alt="{{$recent_news_single->title}}" title="{{$recent_news_single->title}}">
                                                </a>
                                            </div>
                                            <h4 class="archiveTab_hadding"><a href="{{route('news-detail',['id' => $recent_news_single->id])}}"> {{$recent_news_single->title}} </a>
                                            </h4>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel" aria-labelledby="archivePopulars">
                                <div class="archiveTab-sibearNews">
                                    @foreach($popularNews20 as $popular_news_single)
                                        <div class="archive-tabWrpp archiveTab-border">
                                            <div class="archiveTab-image ">
                                                <a href="{{route('news-detail',['id' => $popular_news_single->id])}}">
                                                <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($popular_news_single->image)}}" alt="{{$popular_news_single->title}}" title="{{$popular_news_single->title}}">
                                                </a>
                                            </div>



                                            <h4 class="archiveTab_hadding"><a href="{{route('news-detail',['id' => $popular_news_single->id])}}"> {{$popular_news_single->title}} </a>

                                            </h4>
                                        </div>
                                    @endforeach
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

