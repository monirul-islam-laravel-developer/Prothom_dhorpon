<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reporter extends Model
{
    private static $image,$imageName,$directory,$imageUrl,$reporter;

    public static function getImageUrl($request)
    {
        self::$image              = $request->file('image');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/reporter/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function storeReporter($request)
    {
        $request->validate([
            'name' => 'required|string|max:255|',
        ]);
        self::$reporter = new Reporter();
        self::$reporter->name=$request->name;
        self::$reporter->slug=Str::slug($request->name);
        self::$reporter->designation=$request->designation;
        self::$reporter->mobile=$request->mobile;
        self::$reporter->nid=$request->nid;
        self::$reporter->address=$request->address;
        if ($request->file('image'))
        {
            self::$reporter->image=self::getImageUrl($request);
        }
        self::$reporter->blood_group=$request->blood_group;
        self::$reporter->joining_date=$request->joining_date;
        self::$reporter->save();

    }
    public static function updateReporter($request,$id)
    {
        self::$reporter =Reporter::find($id);
        self::$reporter->name=$request->name;
        self::$reporter->slug=Str::slug($request->name);
        self::$reporter->designation=$request->designation;
        self::$reporter->mobile=$request->mobile;
        self::$reporter->nid=$request->nid;
        self::$reporter->address=$request->address;
        if ($request->file('image'))
        {
            if (file_exists(self::$reporter->image))
            {
                unlink(self::$reporter->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$reporter->image;
        }
        self::$reporter->image=self::$imageUrl;
        self::$reporter->blood_group=$request->blood_group;
        self::$reporter->joining_date=$request->joining_date;
        self::$reporter->save();
    }
}
