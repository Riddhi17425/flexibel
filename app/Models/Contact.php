<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'contact';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fullname',
        'company_name',
        'mobile',
        'email',
        'message',
        'category_id',
        'requirement_type',
    ];
    
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    
}