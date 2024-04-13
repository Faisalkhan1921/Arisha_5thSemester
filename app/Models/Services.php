<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(province::class,'province_id','id');
    }

    public function city()
    {
        return $this->belongsTo(city::class,'city_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
