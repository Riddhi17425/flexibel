<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndustryHomeSlider extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'industry_home_slider';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    protected $casts = [
        'image' => 'array',
        'mobile_image' => 'array',
    ];

}
