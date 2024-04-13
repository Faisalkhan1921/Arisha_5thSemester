<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(province::class,'province_id','id');
    }

}
