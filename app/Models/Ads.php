<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    private static $image,$imageName,$directory,$imageUrl,$ads,
        $headbannerUrl,$homeshironamads1Url,$homeshironamads2Url,
        $newsheadadsUrl,$newspicsunderadsUrl,$homebox1adsUrl,$homebox2adsUrl,
        $newsboxadsUrl;

    public static function head_Ads ($request)
    {
        self::$image              = $request->file('head_banner');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/head-ads/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function home_shironam_Ads1($request)
    {
        self::$image              = $request->file('home_shironam_ads_1');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/home-shironam1/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function home_shironam_Ads2($request)
    {
        self::$image              = $request->file('home_shironam_ads_2');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/home-shironam2/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function news_head_Ads($request)
    {
        self::$image              = $request->file('news_head_ads');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/news-heads-ads/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function news_pics_under_Ads($request)
    {
        self::$image              = $request->file('news_pics_under_ads');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/news-pics-under-ads/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function home_box_1_Ads($request)
    {
        self::$image              = $request->file('home_box1_ads');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/home-box-1-ads/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function home_box_2_Ads($request)
    {
        self::$image              = $request->file('home_box2_ads');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/home-box-2-ads/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function news_box_ads($request)
    {
        self::$image              = $request->file('news_box_ads');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/home-box-ads/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function storeAds($request)
    {
        self::$ads = new Ads();
        if ($request->file('head_banner'))
        {
            self::$ads->head_banner =self::head_Ads($request);
        }
        if ($request->file('home_shironam_ads_1'))
        {
            self::$ads->home_shironam_ads_1 =self::home_shironam_Ads1($request);
        }
        if ($request->file('home_shironam_ads_2'))
        {
            self::$ads->home_shironam_ads_2 =self::home_shironam_Ads2($request);
        }
        if ($request->file('news_head_ads'))
        {
            self::$ads->news_head_ads =self::news_head_Ads($request);
        }
        if ($request->file('news_pics_under_ads'))
        {
            self::$ads->news_pics_under_ads =self::news_pics_under_Ads($request);
        }
        if ($request->file('home_box1_ads'))
        {
            self::$ads->home_box1_ads =self::home_box_1_Ads($request);
        }
        if ($request->file('home_box2_ads'))
        {
            self::$ads->home_box2_ads =self::home_box_2_Ads($request);
        }
        if ($request->file('news_box_ads'))
        {
            self::$ads->news_box_ads =self::news_box_ads($request);
        }
        self::$ads->save();

    }
    public static function updateAds($request, $id)
    {
        self::$ads = Ads::find($id);

        // Head Banner
        if ($request->input('remove_head_banner') == '1') {
            if (file_exists(self::$ads->head_banner)) {
                unlink(self::$ads->head_banner);
            }
            self::$headbannerUrl = null;
        } elseif ($request->file('head_banner')) {
            if (file_exists(self::$ads->head_banner)) {
                unlink(self::$ads->head_banner);
            }
            self::$headbannerUrl = self::head_Ads($request);
        } else {
            self::$headbannerUrl = self::$ads->head_banner;
        }

        // Home Shironam Ads 1
        if ($request->input('remove_home_shironam_ads_1') == '1') {
            if (file_exists(self::$ads->home_shironam_ads_1)) {
                unlink(self::$ads->home_shironam_ads_1);
            }
            self::$homeshironamads1Url = null;
        } elseif ($request->file('home_shironam_ads_1')) {
            if (file_exists(self::$ads->home_shironam_ads_1)) {
                unlink(self::$ads->home_shironam_ads_1);
            }
            self::$homeshironamads1Url = self::home_shironam_Ads1($request);
        } else {
            self::$homeshironamads1Url = self::$ads->home_shironam_ads_1;
        }

        // Home Shironam Ads 2
        if ($request->input('remove_home_shironam_ads_2') == '1') {
            if (file_exists(self::$ads->home_shironam_ads_2)) {
                unlink(self::$ads->home_shironam_ads_2);
            }
            self::$homeshironamads2Url = null;
        } elseif ($request->file('home_shironam_ads_2')) {
            if (file_exists(self::$ads->home_shironam_ads_2)) {
                unlink(self::$ads->home_shironam_ads_2);
            }
            self::$homeshironamads2Url = self::home_shironam_Ads2($request);
        } else {
            self::$homeshironamads2Url = self::$ads->home_shironam_ads_2;
        }

        // News Head Ads
        if ($request->input('remove_news_head_ads') == '1') {
            if (file_exists(self::$ads->news_head_ads)) {
                unlink(self::$ads->news_head_ads);
            }
            self::$newsheadadsUrl = null;
        } elseif ($request->file('news_head_ads')) {
            if (file_exists(self::$ads->news_head_ads)) {
                unlink(self::$ads->news_head_ads);
            }
            self::$newsheadadsUrl = self::news_head_ads($request);
        } else {
            self::$newsheadadsUrl = self::$ads->news_head_ads;
        }

        // News Pics Under Ads
        if ($request->input('remove_news_pics_under_ads') == '1') {
            if (file_exists(self::$ads->news_pics_under_ads)) {
                unlink(self::$ads->news_pics_under_ads);
            }
            self::$newspicsunderadsUrl = null;
        } elseif ($request->file('news_pics_under_ads')) {
            if (file_exists(self::$ads->news_pics_under_ads)) {
                unlink(self::$ads->news_pics_under_ads);
            }
            self::$newspicsunderadsUrl = self::news_pics_under_ads($request);
        } else {
            self::$newspicsunderadsUrl = self::$ads->news_pics_under_ads;
        }

        // Home Box 1 Ads
        if ($request->input('remove_home_box1_ads') == '1') {
            if (file_exists(self::$ads->home_box1_ads)) {
                unlink(self::$ads->home_box1_ads);
            }
            self::$homebox1adsUrl = null;
        } elseif ($request->file('home_box1_ads')) {
            if (file_exists(self::$ads->home_box1_ads)) {
                unlink(self::$ads->home_box1_ads);
            }
            self::$homebox1adsUrl = self::home_box_1_Ads($request);
        } else {
            self::$homebox1adsUrl = self::$ads->home_box1_ads;
        }

        // Home Box 2 Ads
        if ($request->input('remove_home_box2_ads') == '1') {
            if (file_exists(self::$ads->home_box2_ads)) {
                unlink(self::$ads->home_box2_ads);
            }
            self::$homebox2adsUrl = null;
        } elseif ($request->file('home_box2_ads')) {
            if (file_exists(self::$ads->home_box2_ads)) {
                unlink(self::$ads->home_box2_ads);
            }
            self::$homebox2adsUrl = self::home_box_2_Ads($request);
        } else {
            self::$homebox2adsUrl = self::$ads->home_box2_ads;
        }

        // News Box Ads
        if ($request->input('remove_news_box_ads') == '1') {
            if (file_exists(self::$ads->news_box_ads)) {
                unlink(self::$ads->news_box_ads);
            }
            self::$newsboxadsUrl = null;
        } elseif ($request->file('news_box_ads')) {
            if (file_exists(self::$ads->news_box_ads)) {
                unlink(self::$ads->news_box_ads);
            }
            self::$newsboxadsUrl = self::news_box_ads($request);
        } else {
            self::$newsboxadsUrl = self::$ads->news_box_ads;
        }

        // Save all
        self::$ads->head_banner = self::$headbannerUrl;
        self::$ads->home_shironam_ads_1 = self::$homeshironamads1Url;
        self::$ads->home_shironam_ads_2 = self::$homeshironamads2Url;
        self::$ads->news_head_ads = self::$newsheadadsUrl;
        self::$ads->news_pics_under_ads = self::$newspicsunderadsUrl;
        self::$ads->home_box1_ads = self::$homebox1adsUrl;
        self::$ads->home_box2_ads = self::$homebox2adsUrl;
        self::$ads->news_box_ads = self::$newsboxadsUrl;
        self::$ads->save();
    }
}
