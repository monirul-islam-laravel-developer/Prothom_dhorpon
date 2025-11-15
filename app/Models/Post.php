<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Post extends Model
{ public static $post,$image,$imageName,$directory,$imageUrl;

//    public static function getImageUrl($request)
//    {
//        if ($request->hasFile('image')) {
//
//            self::$image      = $request->file('image');
//            self::$imageName  = time() . '.' . self::$image->getClientOriginalExtension();
//            self::$directory  = 'admin/post/image/';
//
//            // ডিরেক্টরি না থাকলে তৈরি করো
//            if (!file_exists(public_path(self::$directory))) {
//                mkdir(public_path(self::$directory), 0777, true);
//            }
//
//            $extension = strtolower(self::$image->getClientOriginalExtension());
//            $path = public_path(self::$directory . self::$imageName);
//
//            // যদি ইমেজ compress করা সম্ভব হয় (JPG, PNG, WEBP)
//            if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {
//                try {
//                    $manager = new ImageManager(new Driver());
//                    $img = $manager->read(self::$image->getRealPath());
//
//                    $quality = 90;
//                    do {
//                        $img->save($path, $quality);
//                        $size = filesize($path) / 1024 / 1024; // MB
//                        $quality -= 5;
//                    } while ($size > 1 && $quality > 10);
//                } catch (\Exception $e) {
//                    // fallback: just move the file
//                    self::$image->move(public_path(self::$directory), self::$imageName);
//                }
//            } else {
//                // অন্য ফাইল টাইপ যেমন GIF, SVG ইত্যাদি সরাসরি সেভ করো
//                self::$image->move(public_path(self::$directory), self::$imageName);
//            }
//
//            self::$imageUrl = self::$directory . self::$imageName;
//            return self::$imageUrl;
//        }
//
//        return null;
//    }
    public static function getImageUrl($request)
    {
        if ($request->hasFile('image')) {

            self::$image      = $request->file('image');
            self::$imageName  = time() . '.' . self::$image->getClientOriginalExtension();
            self::$directory  = 'admin/post/image/';

            if (!file_exists(public_path(self::$directory))) {
                mkdir(public_path(self::$directory), 0777, true);
            }

            $path = public_path(self::$directory . self::$imageName);

            try {
                $manager = new ImageManager(new Driver());
                $img = $manager->read(self::$image->getRealPath());

                // -----------------------------------------------
                // 🔥 STANDARD OG SIZE = 1200 × 630
                // cover() = auto center crop + fit
                // -----------------------------------------------
                $img = $img->cover(1200, 630);

                // -----------------------------------------------
                // 🔥 Compress until <1MB
                // -----------------------------------------------
                $quality = 90;
                do {
                    $img->toJpeg($quality)->save($path);
                    $size = filesize($path) / 1024 / 1024;
                    $quality -= 5;
                } while ($size > 1 && $quality > 10);

            } catch (\Exception $e) {
                self::$image->move(public_path(self::$directory), self::$imageName);
            }

            self::$imageUrl = self::$directory . self::$imageName;
            return self::$imageUrl;
        }

        return null;
    }




    // 🔹 Store post
    public static function storePost($request)
    {
        // Validation
        $request->validate([
            'category_id'        => 'required|integer|exists:categories,id',
            'subcategory_id'     => 'nullable|integer|exists:sub_categories,id',
            'reporter_id'        => 'nullable|integer|exists:reporters,id',
            'title'              => 'required|string|max:255',
            'description'        => 'nullable|string',
            'image'              => 'nullable|image',
            'image_caption'      => 'nullable|string|max:255',
            'slider_news'        => 'nullable|boolean',
            'seo_tag'            => 'nullable|string|max:255',
            'status'             => 'nullable|boolean',
        ]);

        self::$post = new Post();
        self::$post->author_id      = auth()->id();
        self::$post->category_id    = $request->category_id;
        self::$post->subcategory_id = $request->subcategory_id;
        self::$post->dristrict_id   = $request->dristrict_id;
        self::$post->upazela_id     = $request->upazela_id;
        self::$post->reporter_id    = $request->reporter_id;
        self::$post->title          = $request->title;
        self::$post->slug           = Str::slug($request->title);
        self::$post->description    = str_replace('&nbsp;', ' ', $request->input('description'));
        if ($request->has('news_type')) {
            $newsType = $request->input('news_type'); // get the value: lead / sublead / none

            if ($newsType === 'lead') {
                self::$post->lead_news=1;
            }
            elseif ($newsType === 'sublead') {
                self::$post->sublead_news= 1;
            }
            else {
                // None selected
                self::$post->lead_news= 0;
                self::$post->sublead_news= 0;
            }
        }
        self::$post->seo_tag        = $request->seo_tag;
        self::$post->status         = $request->status ?? 1;

        // ✅ Upload + Compress + Save Image (1MB)
        if ($request->file('image')) {
            self::$post->image = self::getImageUrl($request);
        }

        self::$post->image_caption = $request->image_caption;

        self::$post->save();
    }
    public static function updatePost($request, $id)
    {
        self::$post = Post::find($id);

        // Validation
        $request->validate([
            'category_id'        => 'required|integer|exists:categories,id',
            'subcategory_id'     => 'nullable|integer|exists:sub_categories,id',
            'dristrict_id'       => 'nullable|integer|exists:subsub_categories,id',
            'upazela_id'         => 'nullable|integer|exists:upazilas,id',
            'reporter_id'        => 'nullable|integer|exists:reporters,id',
            'title'              => 'required|string|max:255',
            'description'        => 'nullable|string',
            'image'              => 'nullable|image|mimes:jpg,jpeg,png',
            'image_caption'      => 'nullable|string|max:255',
            'slider_news'        => 'nullable|boolean',
            'seo_tag'            => 'nullable|string|max:255',
            'status'             => 'nullable|boolean',
        ]);

        // Image Upload
        if ($request->file('image')) {
            if (file_exists(self::$post->image)) {
                unlink(self::$post->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = self::$post->image;
        }

        // Assign values
        self::$post->author_id   = auth()->id();
        self::$post->category_id = $request->category_id;

        // **Check if subcategory exists for this category**
        $subcats = SubCategory::where('category_id',$request->category_id)->exists();
        if ($subcats) {
            self::$post->subcategory_id =$request->subcategory_id;
        }
        else {
            self::$post->subcategory_id = null;
            self::$post->dristrict_id   = null;
            self::$post->upazela_id     = null;
        }

        // **Check if districts exist for this subcategory**
        if ($request->subcategory_id) {
            $districts =SubsubCategory::where('subcategory_id',$request->subcategory_id)->exists();
            if ($districts) {
                self::$post->dristrict_id = $request->dristrict_id;
            } else {
                self::$post->dristrict_id = null;
                self::$post->upazela_id   = null;
            }
        }

        // **Check if upazilas exist for this district**
        if ($request->dristrict_id) {
            $upazilas = Upazila::where('subsub_categories_id', $request->dristrict_id)->exists();
            if ($upazilas) {
                self::$post->upazela_id = $request->upazela_id;
            } else {
                self::$post->upazela_id = null;
            }
        }

        self::$post->reporter_id = $request->reporter_id;
        self::$post->title       = $request->title;
        self::$post->slug        = Str::slug($request->title);
        self::$post->description = str_replace('&nbsp;', ' ', $request->input('description'));

        // News Type
        if ($request->has('news_type')) {
            $newsType = $request->input('news_type');
            self::$post->lead_news    = $newsType === 'lead' ? 1 : 0;
            self::$post->sublead_news = $newsType === 'sublead' ? 1 : 0;
        }

        self::$post->seo_tag  = $request->seo_tag;
        self::$post->status   = $request->status ?? 1;
        if ($request->file('image')) self::$post->image = self::$imageUrl;
        self::$post->image_caption = $request->image_caption;

        self::$post->save();
    }



























    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // SubCategory
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    // SubSubCategory (District)
    public function subsubCategory()
    {
        return $this->belongsTo(SubSubCategory::class);
    }

    // Upzela
    public function upzela()
    {
        return $this->belongsTo(Upzela::class);
    }
    public function reporter()
    {
        return $this->belongsTo(Reporter::class);
    }
}
