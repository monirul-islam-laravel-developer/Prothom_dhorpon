@extends('master.front.master')
@section('title')
  {{$reporter->name}}
@endsection
@section('body')

    <section class="author-page">
        <div class="container">


            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="row">


                        @php
                            use App\Models\Post;
                            $reporter_posts = Post::where('reporter_id', $reporter->id)
                                         ->where('status', 1)
                                         ->orderBy('id', 'desc')->get();
                        @endphp
                        @foreach($reporter_posts as $rpost)
                        <div class="custom-col-6">
                            <div class="author-wrpp">
                                <div class="authorNews-image">
                                    <img class="lazyload" src="{{ asset(($webLogo->lazyload_logo ?? 'frontend/images/og-default.jpg') . '?v=' . time()) }}l" data-src="{{asset($rpost->image)}}" alt="{{ asset(($webLogo->lazyload_logo ?? 'frontend/images/og-default.jpg') . '?v=' . time()) }}" title="{{$rpost->title}}">


                                </div>
                                <div class="authorPage-content">
                                    <h2 class="authorPage-title">
                                        <a href="{{route('news-detail',$rpost->id)}}"> {{$rpost->title}}</a>
                                    </h2>
                                    <div class="author-date">
                                        <a href="#">{{$rpost->reporter->name}}</a> <span> <i class="las la-clock"></i> {{ \Carbon\Carbon::parse($rpost->created_at)->locale('bn')->bnDiffForHumans() }}
  </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach


{{--                        <div style="text-align: center; display: ruby; margin:20px">  {{ $reporter_posts->links() }}  </div>--}}







                    </div>




                </div>


                <div class="col-lg-4 col-md-4">
                    <div class="fixd-sitebar" style="position: sticky; top: 0;">

                        <div class="authorPage-content" style="text-align:center;">

                            <figure class="authorPagee-image" style="display:inline-block;">
                                <img src="{{ asset($reporter->image) }}" alt="{{$reporter->name}}" style="width:400px; height: 250px; border-radius:6px;">
                            </figure>

                            <h1 class="authorPage-name" style="margin-top:10px;">
                              {{$reporter->name}}</a>
                            </h1>

                            @php
                                // English Number → Bengali Number Convert
                                function en2bn($number){
                                    $bn = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
                                    $en = ['0','1','2','3','4','5','6','7','8','9'];
                                    return str_replace($en, $bn, $number);
                                }

                                $newsCount = \App\Models\Post::where('reporter_id', $reporter->id)->where('status', 1)->count();
                            @endphp

                            <span style="display:block; font-weight:bold; font-size:16px; margin-top:6px;">
        সর্বমোট নিউজ করেছেন : {{ en2bn($newsCount) }}
    </span>

                        </div>


                        <div class="authorCat-title">
                            <span> সর্বশেষ সংবাদ </span>
                        </div>


                        <div class="authorPopular_item">
                            @foreach($latestnews_20 as $l20news)
                            <div class="authorPopular-wrpp">
                                <div class="authorPopular-image">
                                    <img class="lazyload" src="{{ asset(($webLogo->lazyload_logo ?? 'frontend/images/og-default.jpg') . '?v=' . time()) }}" data-src="{{asset($l20news->image)}}" alt="{{ asset(($webLogo->lazyload_logo ?? 'frontend/images/og-default.jpg') . '?v=' . time()) }}" title="{{$l20news->title}}">



                                    <div class="authorPopular-content">
                                        <h4 class="authorPopular-title">
                                            <a href="{{route('news-detail',$l20news->id)}}">{{$l20news->title}}</a>
                                        </h4>
                                        <h6 class="authorPopular-date">
                                            <i class="las la-clock"></i>{{ \Carbon\Carbon::parse($l20news->created_at)->locale('bn')->bnDiffForHumans() }}
                                        </h6>
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



@endsection
