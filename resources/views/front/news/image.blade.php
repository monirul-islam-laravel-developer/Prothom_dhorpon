<?php

$mainImage = $news->image ?? 'default-news.jpg';
$bannerImage = $ads->head_banner ?? 'default-banner.jpg';

$imageBlock = '
<div class="image-container" style="
    position: relative;
    max-width: 600px;
    width: 100%;
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    margin:auto;
">
    <img src="'.asset($mainImage).'" alt="Main Image" style="
        width:100%;
        display:block;
        border-bottom:1px solid #e5e5e5;
    ">
    <div class="overlay-bottom" style="
        width:100%;
        background:#ffffff;
        display:flex;
        align-items:center;
        padding:8px 10px;
        box-sizing:border-box;
        gap:8px;
        flex-wrap:wrap;
    ">
        <img src="'.asset($bannerImage).'" alt="Ad Banner" style="
            flex:1 1 auto;
            width:100%;
            height:auto;
            object-fit:contain;
            border-radius:4px;
            border:1px solid #e2e2e2;
        ">
    </div>
</div>

<style>
@media(max-width:480px) {
    .overlay-bottom {
        flex-direction: column;
        gap:6px;
    }
    .overlay-bottom img {
        width:100%;
        height:auto;
    }
}
</style>
';

// Blade বা PHP তে ব্যবহার:
//echo $imageBlock; // অথবা {!! $imageBlock !!} Blade এ
?>
{!! $imageBlock !!}

