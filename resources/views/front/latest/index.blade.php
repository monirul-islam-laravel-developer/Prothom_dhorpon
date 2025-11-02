@extends('master.front.master')
@section('title')
সর্বশেষ নিউজ
@endsection
@section('og:title')
    সর্বশেষ নিউজ|{{ $webLogo->title ?? config('app.name') }}
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
                            <a href="{{route('home')}}"><i class="la la-home"> </i> </a>  <i class="la la-chevron-right"></i> All Latest News
                        </div>

                        <div class="row">


                            @foreach($all_latestnewses as $latest_news)
                            <div class="custom-col4">
                                <div class="date-page-wrpp">
                                    <div class="date-image">
                                        <a href="{{route('news-detail',[$latest_news->id,$latest_news->slug])}}"><img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($latest_news->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$latest_news->title}}"></a>



                                    </div>
                                    <h4 class="datePage-title">
                                        <a href="{{route('news-detail',[$latest_news->id,$latest_news->slug])}}">{{$latest_news->title}}</a>
                                    </h4>

                                    <div class="date-meta">
                                        <a href="#"><i class="las la-tags"> </i>  {{ \Carbon\Carbon::parse($latest_news->created_at)->locale('bn')->diffForHumans() }}
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
