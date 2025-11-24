<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="AnchorBarta">
    <meta name="csrf-token" content="npv0BOp6m8gjl8YmLleA8kPNIXTsqhE6TJsDtfst">


    <title>@yield('title')</title>
    {{-- 🌐 SEO & Open Graph Meta --}}
    <meta name="keywords" content="@yield('keyword')">
    <meta name="description" content="বাংলাদেশসহ বিশ্বের সর্বশেষ সংবাদ শিরোনাম, প্রতিবেদন, বিশ্লেষণ, খেলা, বিনোদন, চাকরি, রাজনীতি ও বাণিজ্যের বাংলা নিউজ পড়তে ভিজিট করুন।">

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og:title')">
    <meta property="og:description" content="@yield('og:description')">
    <meta property="og:image" content="@yield('og:image')">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('twiter:title')" />
    <meta name="twitter:description" content="@yield('twiter:description')" />
    <meta name="twitter:image" content="@yield('twiter:image')" />
    <meta name="brand_name" content="This Is Twitter Share Title" />
    <meta name="twitter:creator" content="@prothomdorpon">
    <meta name="twitter:site" content="@prothomdorpon">


    <link rel="icon" href="{{ asset($webLogo->fav_icon_logo) }}" sizes="50x50" type="image/png">


   @include('front.include.css')


</head>



<script>
    setInterval(displayTime, 1000);

    function displayTime() {

        const timeNow = new Date();

        let hoursOfDay = timeNow.getHours();
        let minutes = timeNow.getMinutes();
        let seconds = timeNow.getSeconds();
        let weekDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
        let today = weekDay[timeNow.getDay()];
        let months = timeNow.toLocaleString("default", {
            month: "long"
        });
        let year = timeNow.getFullYear();
        let period = "AM";

        if (hoursOfDay > 12) {
            hoursOfDay-= 12;
            period = "PM";
        }

        if (hoursOfDay === 0) {
            hoursOfDay = 12;
            period = "AM";
        }

        hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        let time = hoursOfDay + ":" + minutes + ":" + seconds + " " + period;

        document.getElementById('Clock').innerHTML = time ;

        var chars = {'1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯','0':'০','A':'এ','P':'পি','M':'এম'};
        let str = document.getElementById("Clock").innerHTML;
        let res = str.replace(/[1234567890AMP]/g, m => chars[m]);
        document.getElementById("Clock").innerHTML = res;

    }
    displayTime();

</script>

<script>
    setInterval(displayTimeen, 1000);

    function displayTimeen() {

        const timeNow = new Date();

        let hoursOfDay = timeNow.getHours();
        let minutes = timeNow.getMinutes();
        let seconds = timeNow.getSeconds();
        let weekDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
        let today = weekDay[timeNow.getDay()];
        let months = timeNow.toLocaleString("default", {
            month: "long"
        });
        let year = timeNow.getFullYear();
        let period = "AM";

        if (hoursOfDay > 12) {
            hoursOfDay-= 12;
            period = "PM";
        }

        if (hoursOfDay === 0) {
            hoursOfDay = 12;
            period = "AM";
        }

        hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        let time = hoursOfDay + ":" + minutes + ":" + seconds + " " + period;

        document.getElementById('Clocken').innerHTML = time ;
    }
    displayTimeen();

</script>






<!--=============== Header section Start ========================-->
@include('front.include.header')
<!--=============== Header section End ========================-->





<!--=======================
                        Menu-section-Start
                    ==========================-->
@include('front.include.menusection')
<!--=======================
                        Menu-section-End
                    ==========================-->



@include('front.include.shironam')

<!--============Scroll 05 End==============-->

@yield('body')

<!--=======================
                            footer-area start
                        ==========================-->
@include('front.include.footer')



<!--=======================
                            footer-area-End
                        ==========================-->

@include('front.include.footerscrollbar')

@include('front.include.js')
</body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0">
</script>


</html>




