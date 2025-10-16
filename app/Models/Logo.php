<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    private static $image,$imageName,$directory,$imageUrl,$logo,$desktoplogoUrl,$mobilelogoUrl,$faviconUrl,$lazyloadUrl;

    public static function getDesktopImage($request)
    {
        self::$image              = $request->file('desktop_logo');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/desktop-logo/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function getMobileImage($request)
    {
        self::$image              = $request->file('mobile_logo');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/mobile-logo/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function getfavIconImage($request)
    {
        self::$image              = $request->file('fav_icon_logo');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/lazyload-logo/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function getLazyloadImage($request)
    {
        self::$image              = $request->file('lazyload_logo');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/fav-icon-logo/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function storeLogo($request)
    {
        $request->validate([
            'desktop_logo' => 'required|',
        ]);
        self::$logo = new Logo();
        if ($request->file('desktop_logo'))
        {
            self::$logo->desktop_logo=self::getDesktopImage($request);
        }
        if ($request->file('mobile_logo'))
        {
            self::$logo->mobile_logo=self::getMobileImage($request);
        }
        if ($request->file('fav_icon_logo'))
        {
            self::$logo->fav_icon_logo=self::getfavIconImage($request);
        }
        if ($request->file('lazyload_logo'))
        {
            self::$logo->lazyload_logo=self::getLazyloadImage($request);
        }
        self::$logo->title=$request->title;
        self::$logo->save();

    }
    public static function updateLogo($request,$id)
    {
        self::$logo =Logo::find($id);
        if ($request->file('desktop_logo'))
        {
            if (file_exists(self::$logo->desktop_logo))
            {
                unlink(self::$logo->desktop_logo);
            }
            self::$desktoplogoUrl=self::getDesktopImage($request);
        }
        else
        {
            self::$desktoplogoUrl=self::$logo->desktop_logo;
        }
        if ($request->file('mobile_logo'))
        {
            if (file_exists(self::$logo->mobile_logo))
            {
                unlink(self::$logo->mobile_logo);
            }
            self::$mobilelogoUrl=self::getMobileImage($request);
        }
        else
        {
            self::$mobilelogoUrl=self::$logo->mobile_logo;
        }
        if ($request->file('fav_icon_logo'))
        {
            if (file_exists(self::$logo->fav_icon_logo))
            {
                unlink(self::$logo->fav_icon_logo);
            }
            self::$faviconUrl=self::getFavIconImage($request);
        }
        else
        {
            self::$faviconUrl=self::$logo->fav_icon_logo;
        }
        if ($request->file('lazyload_logo'))
        {
            if (file_exists(self::$logo->lazyload_logo))
            {
                unlink(self::$logo->lazyload_logo);
            }
            self::$lazyloadUrl=self::getLazyloadImage($request);
        }
        else
        {
            self::$lazyloadUrl=self::$logo->lazyload_logo;
        }
        self::$logo->desktop_logo = self::$desktoplogoUrl;
        self::$logo->mobile_logo = self::$mobilelogoUrl;
        self::$logo->fav_icon_logo = self::$faviconUrl;
        self::$logo->lazyload_logo = self::$lazyloadUrl;
        self::$logo->title=$request->title;

        self::$logo->save();
    }
}
