<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInquiry extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_inquiry'; 
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
        'company_name',
        'product_name',
        'email',
        'mobile',
        'country',
    ];
    protected $dates = ['deleted_at'];

} 