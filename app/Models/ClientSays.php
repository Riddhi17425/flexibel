<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClientSays extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'clientsays';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];

}