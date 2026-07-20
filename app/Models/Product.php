<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'top_banner',
        'side_menu_image',
        'front_image',
        'short_description',
        'features',
        'application',
        'description',
        'item_description',
        'meta_title',
        'meta_description',
        'adv_image',
        'adv_description',
        'pressure_thurst_heading',
        'pressure_thurst_table',
        'torsional_rotation_heading',
        'torsional_rotation_table',
        'req_image',
        'req_description',
    ];
     public function productcategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'subcategory_id');
    }
}
