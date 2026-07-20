<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatasheetCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'datasheet_categories';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title'];

    public function subcategories()
    {
        return $this->hasMany(DatasheetSubCategory::class, 'category_id', 'id');
    }
}
