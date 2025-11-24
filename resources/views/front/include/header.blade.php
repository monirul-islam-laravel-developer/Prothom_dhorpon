<header class="themesbazar_header">
    <div class="container">
        <div class="row">
{{--            <div class="col-lg-5 col-md-5">--}}
{{--                <div class="date">--}}
{{--                    <i class="lar la-calendar"></i>--}}
{{--                    <span id="bdClock"></span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <script>--}}
{{--                function banglaEnglishBangabdaClock() {--}}
{{--                    const clock = document.getElementById('bdClock');--}}

{{--                    const bnNumbers = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];--}}
{{--                    const bnAmPm = {'AM':'পূর্বাহ্ণ','PM':'অপরাহ্ণ'};--}}
{{--                    const banglaMonths = ['বৈশাখ','জ্যৈষ্ঠ','আষাঢ়','শ্রাবণ','ভাদ্র','আশ্বিন','কার্তিক','অগ্রহায়ণ','পৌষ','মাঘ','ফাল্গুন','চৈত্র'];--}}
{{--                    const banglaDays = ['রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার','শনিবার'];--}}

{{--                    setInterval(() => {--}}
{{--                        const now = new Date();--}}

{{--                        // Bangladesh UTC+6--}}
{{--                        const utc = now.getTime() + (now.getTimezoneOffset() * 60000);--}}
{{--                        const bdTime = new Date(utc + (6 * 3600000));--}}

{{--                        // Components--}}
{{--                        let day = bdTime.getDate();--}}
{{--                        let month = bdTime.getMonth(); // 0-11--}}
{{--                        let year = bdTime.getFullYear();--}}
{{--                        let weekday = bdTime.getDay(); // 0-6--}}
{{--                        let hours = bdTime.getHours();--}}
{{--                        let minutes = bdTime.getMinutes();--}}
{{--                        let seconds = bdTime.getSeconds();--}}
{{--                        let ampm = hours >= 12 ? 'PM' : 'AM';--}}

{{--                        hours = hours % 12 || 12; // 12-hour format--}}

{{--                        // Convert numbers to Bangla--}}
{{--                        const convertBn = num => num.toString().split('').map(d=>bnNumbers[d]||d).join('');--}}
{{--                        const bHours = convertBn(hours);--}}
{{--                        const bMinutes = convertBn(minutes.toString().padStart(2,'0'));--}}
{{--                        const bSeconds = convertBn(seconds.toString().padStart(2,'0'));--}}
{{--                        const bDay = convertBn(day);--}}
{{--                        const bYear = convertBn(year - 593); // approx Bangabda year--}}

{{--                        // Bangla month for Bangabda--}}
{{--                        const banglaMonth = banglaMonths[month];--}}

{{--                        // Assemble string--}}
{{--                        const displayStr = `${banglaDays[weekday]}, ${bdTime.toLocaleString('en-US', { month:'long', day:'numeric', year:'numeric' })}, ${bDay} ${banglaMonth} ${bYear} বঙ্গাব্দ, ${bHours}:${bMinutes}:${bSeconds} ${bnAmPm[ampm]}`;--}}

{{--                        clock.innerHTML = displayStr;--}}
{{--                    }, 1000);--}}
{{--                }--}}

{{--                banglaEnglishBangabdaClock();--}}
{{--            </script>--}}




{{--            <div class="col-lg-3 col-md-3">--}}
{{--                <form class="header-search" method="get" action="https://themebazar.xyz/laraflash/news/post/search">--}}
{{--                    <input type="hidden" name="_token" value="npv0BOp6m8gjl8YmLleA8kPNIXTsqhE6TJsDtfst">                        <input type="text" name="search"  placeholder="এখানে লিখুন">--}}
{{--                    <button type="submit" value="খুজুন"> <i class="las la-search"></i> </button>--}}
{{--                </form>--}}


{{--            </div>--}}
{{--            <div class="col-lg-4 col-md-4">--}}
{{--                <div class="header-social">--}}
{{--                    <ul>--}}
{{--                        <li><a href="https://www.facebook.com/themesbazar"> <i class="lab la-facebook-f"></i> </a></li>--}}
{{--                        <li><a href="https://www.twitter.com/themesbazar"> <i class="lab la-twitter"></i> </a></li>--}}
{{--                        <li><a href="https://www.linkedin.com/themesbazar"> <i class="lab la-linkedin-in"></i> </a></li>--}}
{{--                        <li><a href="https://www.youtube.com/themesbazar"> <i class="lab la-youtube"></i> </a></li>--}}


{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

    <!--=============== Logo banner section Start ========================-->
    <section class="logo-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="{{route('home')}}"> <img src="{{asset($webLogo->desktop_logo)}}" style="height: 120px;" alt="LaraFlash"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="banner">
                        <a href="{{ route('home') }}" target="_blank">
                            <img
                                src="{{ isset($ads->head_banner) && $ads->head_banner ? asset($ads->head_banner) : asset('front/templateimage/63ad66eeaa3fc.gif') }}"
                                alt="{{ $webLogo->title }}"
                                class="img-fluid"
                                style=" height:100px;"
                            >
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <div class="col-lg-3 col-md-3">
        <form class="header-search" method="get" action="{{ route('search-news') }}">
            <input type="text" name="search" placeholder="এখানে লিখুন">
            <button type="submit"><i class="las la-search"></i></button>
        </form>



    </div>
    <!--=============== Logo banner section End ========================-->



</header>
