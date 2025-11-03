<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubsubCategory extends Model
{
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function upazilas()
    {
        return $this->hasMany(Upazila::class, 'subsub_categories_id'); // DB column অনুযায়ী foreign key
    }


    public function posts()
    {
        return $this->hasMany(Post::class, 'dristrict_id');
    }

}
