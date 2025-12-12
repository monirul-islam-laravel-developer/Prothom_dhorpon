@extends('master.front.master')
@section('title')
   ফটোগ্যালারী
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
    <style>
        .img-modal {
            display: none;
            position: fixed;
            z-index: 99999;
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
        }

        .img-modal-content {
            display: block;
            margin: auto;
            max-width: 90%;
            max-height: 90%;
            border-radius: 5px;
        }

        .img-close {
            position: absolute;
            top: 20px;
            right: 40px;
            color: #fff;
            font-size: 40px;
            cursor: pointer;
        }

    </style>

    <section class="photoArchive-page">
        <div class="container">

            <div class="photoArchive-page-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="archive-info-cats">
                            <a href="{{route('home')}}"><i class="la la-home"> </i> </a>  <i class="la la-chevron-right"></i> ফটোগ্যালারী
                        </div>

                        <div class="row">

                            @foreach($all_photosgalleries as $photosgallery )

                            <div class="themesBazar-4 themesBazar-m2">
                                <div class="photoArchive-page-wrpp">
                                    <div class="photoArchive-page-image">
                                        <a class="photoArchive-pageIcon themesbazar"
                                           href="javascript:void(0)"
                                           onclick="openImageModal('{{ asset($photosgallery->image) }}')">

                                            <i class="las la-camera"></i>
                                            <img src="{{ asset($photosgallery->image) }}" alt="{{ $photosgallery->title }}">
                                        </a>

                                    </div>
                                    <div class="photoArchive-page-title">
                                        <a href="#"> {{$photosgallery->title}} </a>
                                    </div>

                                </div>
                            </div>
                            @endforeach







                        </div>

                        <div style="text-align: center; display: ruby; margin : 20px">  </div>

                    </div>

                </div>


            </div>




        </div>
    </section>
    <div id="imageModal" class="img-modal">
        <span class="img-close" onclick="closeImageModal()">&times;</span>
        <img class="img-modal-content" id="modalImage">
    </div>

    <script>
        function openImageModal(src) {
            document.getElementById("modalImage").src = src;
            document.getElementById("imageModal").style.display = "block";
        }

        function closeImageModal() {
            document.getElementById("imageModal").style.display = "none";
        }
    </script>

@endsection
