<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model
{
    private static $image,$imageName,$directory,$imageUrl,$video;

    public static function getImageUrl($request)
    {
        self::$image              = $request->file('image');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/video/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function storeVideo($request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);
        self::$video               = new Video();
        self::$video->title         =$request->title;
        self::$video->link        =$request->link;
        if ($request->file('image'))
        {
            self::$video->image    =self::getImageUrl($request);
        }
        self::$video->save();

    }
    public static function updateVideo($request,$id)
    {
        self::$video       =Video::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$video->image))
            {
                unlink(self::$video->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$video->image;
        }
        self::$video->title            =$request->title;
        self::$video->link            =$request->link;
        self::$video->image           =self::$imageUrl;
        self::$video->save();

    }
}
