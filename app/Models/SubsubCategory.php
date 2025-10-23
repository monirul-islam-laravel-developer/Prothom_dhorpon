<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubsubCategory extends Model
{
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function upzelas()
    {
        return $this->hasMany(Upzela::class);
    }
}
