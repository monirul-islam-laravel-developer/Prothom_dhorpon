<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_categories_id');
    }
    public function subsubcategory()
    {
        return $this->belongsTo(SubsubCategory::class,'subsub_categories_id');
    }

}
