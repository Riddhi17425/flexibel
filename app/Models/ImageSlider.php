<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageSlider extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $table = 'gallary_image';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}