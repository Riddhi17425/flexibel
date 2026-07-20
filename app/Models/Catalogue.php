<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalogue extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'catalogue';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'fullname',
    'company_name',
    // 'year',
    'phone',
    'email',
    'message',
    //'resume',
    ];
}
