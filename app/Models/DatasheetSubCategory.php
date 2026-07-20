<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatasheetSubCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'datasheet_subcategories';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','category_id','image','alt_tag'];

    public function category()
    {
        return $this->belongsTo(DatasheetCategory::class);
    }
}
