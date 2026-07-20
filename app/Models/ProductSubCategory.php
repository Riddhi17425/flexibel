<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductSubCategory extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'product_subcategory';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }
    
}
