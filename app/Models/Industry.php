<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industry extends Model
{   
    use SoftDeletes;
    
    use HasFactory;
    protected $table = 'industry';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}