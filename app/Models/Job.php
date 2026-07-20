<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{   
    use SoftDeletes;
    use HasFactory;
    protected $table = 'job';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}