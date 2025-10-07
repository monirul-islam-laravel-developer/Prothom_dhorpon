<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    private static $image,$imageName,$directory,$imageUrl,$category;

    public static function getImageUrl($request)
    {
        self::$image              = $request->file('image');
        self::$imageName          = time() .'.'. self::$image->getClientOriginalName();
        self::$directory          ='admin/category/image/';
        self::$image              ->move(self::$directory,self::$imageName);
        self::$imageUrl           =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function storeCategory($request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            // or validate slug if you accept it from user input
            // 'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'seo_tag' => 'nullable|string|max:255',
        ]);
        self::$category               = new Category();
        self::$category->name         =$request->name;
        self::$category->slug         =Str::slug($request->name);
        self::$category->description  =$request->description;
        if ($request->file('image'))
        {
            self::$category->image    =self::getImageUrl($request);
        }
        self::$category->seo_tag      =$request->seo_tag;
        self::$category->save();


    }
    public static function updateCategory($request,$id)
    {
        self::$category       =Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$category->image;
        }
        self::$category->name            =$request->name;
        self::$category->slug            =Str::slug($request->name);
        self::$category->description     =$request->description;
        self::$category->image           =self::$imageUrl;
        self::$category->seo_tag         =$request->seo_tag;
        self::$category->save();

    }


}

