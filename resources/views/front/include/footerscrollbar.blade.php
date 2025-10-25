<div class="footer-scrool">
    <div class="footer-scrool-1">
        <span>নোটিশ </span>
    </div>

    <div class="footer-scrool-2">
        <marquee direction="left" scrollamount="5" onmouseover="this.stop()" onmouseout="this.start()">
            <i class="lar la-dot-circle"></i>
            @foreach($scrollbars5 as $scrollbar)
                <a href="#">
                    {{ $scrollbar->title }}।
                </a>
            @endforeach
        </marquee>
    </div>
</div>
