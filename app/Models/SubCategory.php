<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    public static $image,$imageName,$directory,$imageUrl,$subcategory,$subcategorySlug;

    public static function getImageUrl($request)
    {
        self::$image=$request->file('image');
        self::$imageName = time() . '_' . self::$image->getClientOriginalName();
        self::$directory='admin/subcategory/image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function storeSubCategory($request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sub_categories,name',
            // or validate slug if you accept it from user input
            // 'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'seo_tag' => 'nullable|string|max:255',
        ]);
        self::$subcategory               = new SubCategory();
        self::$subcategory->name         =$request->name;
        self::$subcategory->slug         =Str::slug($request->name);
        self::$subcategory->category_id   =$request->category_id;
        self::$subcategory->description  =$request->description;
        if ($request->file('image'))
        {
            self::$subcategory->image    =self::getImageUrl($request);
        }
        self::$subcategory->seo_tag      =$request->seo_tag;
        self::$subcategory->save();


    }
    public static function updateSubCategory($request,$id)
    {
        self::$subcategory = SubCategory::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self::$subcategory->image))
            {
                unlink(self::$subcategory->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$subcategory->image;
        }
        self::$subcategory->name         =$request->name;
        self::$subcategory->slug         =Str::slug($request->name);
        self::$subcategory->category_id   =$request->category_id;
        self::$subcategory->description  =$request->description;
        self::$subcategory->image        =self::$imageUrl;
        self::$subcategory->seo_tag      =$request->seo_tag;
        self::$subcategory->save();

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
