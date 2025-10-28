<div class="top-scroll-section5">
    <div class="container">

        <div class="alert" role="alert">
            <div class="scroll-section5">
                <div class="row">
                    <div class="col-md-12 top_scroll2">
                        <div class="scroll5-left">
                            <div id="scroll5-left">
                                <span> সংবাদ শিরোনাম :  </span>
                            </div>

                        </div>

                        <div class="scroll5-right">
                            <marquee direction="left" scrollamount="5px" onmouseover="this.stop()" onmouseout="this.start()">
                                @foreach($latestnews_10 as $latest_shironam)
                                <a href="136.html"> <i class="las la-bullseye"></i>{{$latest_shironam->title}}</a>
                                @endforeach



                            </marquee>
                        </div>
                        <div class="scroolbar5">
                            <button data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
