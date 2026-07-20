<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhatWeDo extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'what_we_do';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}
