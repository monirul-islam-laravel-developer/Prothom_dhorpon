<footer class="footer-area">
    <div class="container">


        <div class="footer-menu">
            <ul>
                <li><a href="{{route('about-us')}}" > আমাদের সম্পর্কে </a></li>
                <li><a href="{{route('privacy-policy')}}" >গোপনীয়তা নীতি</a></li>
                <li><a href="{{route('terms-and-condition')}}" >শর্তাবলী ও নিয়মাবলী</a></li>
                <li><a href="sitemap.xml" > সাইটম্যাপ </a></li>
                <li><a href="feed" > আরএসএস </a></li>
                <li><a href="all/video/gallery.html" > ভিডিও গ্যালারী </a></li>
                <li><a href="" > ফটোগ্যালারী </a></li>
                <li><a href="{{route('amaderporibar')}}" > আমাদের পরিবার </a></li>
                <li><a href="{{route('latest-news')}}" > সকল নিউজ </a></li>

            </ul>
        </div>



        <div class="footerColor">

            <div class="row">


                <div class="col-lg-12 col-md-12">



                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h3 class="footer-title">
                                সম্পাদকীয় :
                            </h3>
                            <div class="footer-content">
                                @isset($editoral->publisher_and_editor)
                                    <p align="left">প্রকাশকঃ&nbsp;{{ $editoral->publisher_and_editor }}</p>
                                @endisset

                                @isset($editoral->editor)
                                    <p align="left">প্রধান সম্পাদকঃ&nbsp;{{ $editoral->editor }}</p>
                                @endisset
                                    @isset($editoral->mobile1)
                                        <p align="left">মোবাইলঃ-&nbsp;{{ $editoral->mobile1 }}</p>
                                    @endisset

                                @isset($editoral->executive_editor)
                                    <p align="left">নির্বাহী সম্পাদকঃ&nbsp;{{ $editoral->executive_editor }}</p>
                                @endisset

                                @isset($editoral->multimedia_incharge)
                                    <p align="left">মাল্টিমিডিয়া ইনচার্জঃ&nbsp;{{ $editoral->multimedia_incharge }}</p>
                                @endisset
                                    @isset($editoral->mobile2)
                                        <p align="left">মোবাইলঃ-&nbsp;{{ $editoral->mobile2 }}</p>
                                    @endisset

                                @isset($editoral->message_editor)
                                    <p align="left">বার্তা সম্পাদকঃ&nbsp;{{ $editoral->message_editor }}</p>
                                @endisset

                                @isset($editoral->legal_advisor)
                                    <p align="left">আইন বিষয়ক উপদেষ্টাঃ&nbsp;{{ $editoral->legal_advisor }}</p>
                                @endisset

                                @isset($editoral->advisor)
                                    <p align="left">উপদেষ্টাঃ&nbsp;{{ $editoral->advisor }}</p>
                                @endisset
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h3 class="footer-title">
                                অফিস :
                            </h3>
                            <div class="footer-content">
                                @isset($editoral->office)
                                    <p align="left">অফিসঃ-&nbsp;{{ $editoral->office }}।</p>
                                @endisset

                                @isset($editoral->office2)
                                    <p align="left">সিরাজগঞ্জ অফিসঃ-&nbsp;{{ $editoral->office2 }}।</p>
                                @endisset

                                @isset($editoral->email)
                                    <p align="left">ইমেইলঃ-&nbsp;{{ $editoral->email }}</p>
                                @endisset

                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <div class="copy_right_section">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copy-right">
                            © All rights reserved © প্রথম দর্পণ মাল্টিমিডিয়া
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="design-developed">
                            NewsScript Developed BY  <a href="https://monirulbd.com/" target="_blank" title="ThemesBazar.com">Monirul</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="scrollToTop"><i class="las la-long-arrow-alt-up"></i></a>

    </div>
</footer>
