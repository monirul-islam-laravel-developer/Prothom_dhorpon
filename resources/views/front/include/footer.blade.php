<footer class="footer-area">
    <div class="container">


        <div class="footer-menu">
            <ul>
                <li><a href="{{route('amaderporibar')}}" > আমাদের পরিবার </a></li>
                <li><a href="{{route('latest-news')}}" > সকল নিউজ </a></li>
                <li><a href="{{route('all-video')}}" > ভিডিও গ্যালারী </a></li>
                <li><a href="{{route('photo-gallery')}}" > ফটোগ্যালারী </a></li>
                <li><a href="{{route('about-us')}}" > আমাদের সম্পর্কে </a></li>
                <li><a href="{{route('privacy-policy')}}" >গোপনীয়তা নীতি</a></li>
                <li><a href="{{route('terms-and-condition')}}" >শর্তাবলী ও নিয়মাবলী</a></li>




            </ul>
        </div>



        <div class="footerColor">

            <div class="row">


                <div class="col-lg-12 col-md-12">


                    <style>
                        /* হেডিং এর নিচে full width hr */
                        .footer-title {
                            position: relative;
                            margin-bottom: 20px;
                            font-weight: bold;
                            font-size: 1.3rem;
                        }

                        .footer-title::after {
                            content: "";
                            display: block;
                            width: 100%;
                            height: 3px;           /* লাইন এর thickness */
                            background: #007bff;   /* header line color */
                            margin-top: 5px;
                            border-radius: 2px;
                        }

                        /* Mobile view এ column এর মাঝে line */
                        @media (max-width: 767px) {
                            .footer-column:not(:last-child) {
                                border-bottom: 3px solid #007bff; /* মোটা line এবং color adjust */
                                padding-bottom: 15px;
                                margin-bottom: 15px;
                            }
                        }

                        /* Desktop view এ column spacing */
                        .footer-column {
                            padding-right: 15px;
                            padding-left: 15px;
                        }

                        .footer-content p {
                            margin-bottom: 8px;
                        }
                    </style>

                    <div class="row g-3">
                        <div class="col-12">
                            <h3 class="footer-title">সম্পাদকীয় :</h3>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 footer-column">
                            <div class="footer-content">
                                @isset($editoral->editor)
                                    <p>প্রকাশক ও সম্পাদকঃ {{ $editoral->editor }}</p>
                                @endisset
                                @isset($editoral->mobile1)
                                    <p>মোবাইলঃ {{ $editoral->mobile1 }}</p>
                                @endisset
                                @isset($editoral->executive_editor)
                                    <p>নির্বাহী সম্পাদকঃ {{ $editoral->executive_editor }}</p>
                                @endisset
                                @isset($editoral->multimedia_incharge)
                                    <p>মাল্টিমিডিয়া ইনচার্জঃ {{ $editoral->multimedia_incharge }}</p>
                                @endisset
                                @isset($editoral->mobile2)
                                    <p>মোবাইলঃ {{ $editoral->mobile2 }}</p>
                                @endisset
                                @isset($editoral->message_editor)
                                    <p>বার্তা সম্পাদকঃ {{ $editoral->message_editor }}</p>
                                @endisset
                                @isset($editoral->legal_advisor)
                                    <p>আইন বিষয়ক উপদেষ্টাঃ {{ $editoral->legal_advisor }}</p>
                                @endisset
                                @isset($editoral->advisor)
                                    <p>উপদেষ্টাঃ {{ $editoral->advisor }}</p>
                                @endisset
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 footer-column">
                            <div class="footer-content">
                                @isset($editoral->office)
                                    <p>অফিসঃ {{ $editoral->office }}।</p>
                                @endisset
                                @isset($editoral->office2)
                                    <p>সিরাজগঞ্জ অফিসঃ {{ $editoral->office2 }}।</p>
                                @endisset
                                @isset($editoral->email)
                                    <p>ইমেইলঃ {{ $editoral->email }}</p>
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
                            © All rights reserved © ২০২৫ © প্রথম দর্পণ মাল্টিমিডিয়া
                        </div>
                    </div>
                    <style>
                        @keyframes rainbow-blink {
                            0%   { color: #ff0000; }
                            14%  { color: #ff7f00; }
                            28%  { color: #ffff00; }
                            42%  { color: #00ff00; }
                            57%  { color: #0000ff; }
                            71%  { color: #4b0082; }
                            85%  { color: #8f00ff; }
                            100% { color: #ff0000; }
                        }

                        .design-developed {
                            font-family: 'Poppins', sans-serif;
                            font-size: 16px;
                            color: #555;
                            text-align: center;
                        }

                        .design-developed a {
                            font-weight: bold;
                            text-decoration: none;
                            animation: rainbow-blink 2s linear infinite; /* blink + color change */
                        }
                    </style>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="design-developed">
                                Developed BY <a href="https://monirulbd.com/" target="_blank" title="monirulbd.comf">Monirul Islam</a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <a href="#" class="scrollToTop"><i class="las la-long-arrow-alt-up"></i></a>

    </div>
</footer>
