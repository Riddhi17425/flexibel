<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lifeimage extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'lifeimage';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}