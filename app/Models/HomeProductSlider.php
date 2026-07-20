<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeProductSlider extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'home_product_slider';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    protected $casts = [
        'image_desktop' => 'array',
        'image_mobile' => 'array',
    ];
    
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
