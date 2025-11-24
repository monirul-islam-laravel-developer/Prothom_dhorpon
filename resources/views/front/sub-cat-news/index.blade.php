@extends('master.front.master')
@section('title')
    {{$subcategory->description}}
@endsection
@section('og:title')
    {{ $subcategory->name ?? config('app.name') }}
@endsection
@section('keyword')
    {{$subcategory->seo_tag}}
@endsection

@section('og:description')
    {{ $subcategory->description ?? 'সর্বশেষ খবর, বিশ্লেষণ এবং প্রতিবেদন পড়ুন আমাদের পোর্টালে।' }}
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
                        <a href="{{route('home')}}"><i class="las la-home"> </i> </a>  <i class="las la-angle-right"></i> {{$subcategory->name}}
                    </div>
                    @if($subcategory->subsubcategories->count() > 0)
                        <div class="subcategory-scroll mt-3">
                            @foreach($subcategory->subsubcategories as $sub_subcategory)
                                <a href="{{route('district-news2',[$sub_subcategory->id,$sub_subcategory->slug])}}">
                                    {{ $sub_subcategory->name }}
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <div class="archivePage-content2">
                        <div class="row">

                            @foreach($subcat_newses as $subcat_news)
                                <div class="themesBazar-3 themesBazar-m2">
                                    <div class="archivePage-wrpp2">
                                        <div class="archive2-image">
                                            <a href="{{route('news-detail',$subcat_news->id)}}"><img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($subcat_news->image)}}" alt="{{$subcat_news->title}}" title="{{$subcat_news->title}}">
                                            </a>
                                        </div>
                                        <h4 class="archivePage2-title">
                                            <a href="{{route('news-detail',[$subcat_news->id])}}">{{$subcat_news->title}} </a>
                                        </h4>

                                        <div class="archive-meta2">
                                            <a href="#"><i class="las la-tags"> </i>
                                                {{ \Carbon\Carbon::parse($subcat_news->created_at)->locale('bn')->bnDiffForHumans() }}

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div style="text-align: center; margin:20px; display:display: ruby;">  </div>


                                <div class="d-flex justify-content-center mt-2 mb-2 pt-2 pb-2 border-top">
                                    {{ $subcat_newses->links('pagination::bootstrap-5') }}
                                </div>


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

                                    @foreach($latestnews_20 as $lnews20)
                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <a href="{{route('news-detail',$lnews20->id)}}">
                                            <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($lnews20->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$lnews20->title}}">
                                            </a>
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="{{route('news-detail',[$lnews20->id])}}">{{$lnews20->title}}</a>

                                        </h4>

                                        <div class="archive-conut">
                                            {{ str_replace(
             ['0','1','2','3','4','5','6','7','8','9'],
             ['০','১','২','৩','৪','৫','৬','৭','৮','৯'],
             $loop->iteration
         ) }}

                                        </div>


                                    </div>
                                    @endforeach




                                </div>




                            </div>


                            <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel" aria-labelledby="archivePopulars">
                                <div class="archiveTab-sibearNews">

                                    @foreach($popularNews20 as $pnews1)
                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <a href="{{route('news-detail',$pnews1->id)}}">
                                            <img class="lazyload" src="{{asset($webLogo->lazyload_logo)}}" data-src="{{asset($pnews1->image)}}" alt="{{asset($webLogo->lazyload_logo)}}" title="{{$pnews1->title}}">
                                            </a>
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="{{route('news-detail',[$pnews1->id])}}">{{$pnews1->title}}</a>

                                        </h4>

                                        <div class="archive-conut">
                                            {{ str_replace(
             ['0','1','2','3','4','5','6','7','8','9'],
             ['০','১','২','৩','৪','৫','৬','৭','৮','৯'],
             $loop->iteration
         ) }}

                                        </div>


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

