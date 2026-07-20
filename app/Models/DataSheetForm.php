<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataSheetForm extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'datasheet_form';
    protected $primarykey = 'id';
    protected $dates = ['deleted_at'];
     protected $fillable = [
        'fullname',
        'mobile',
        'email',
        'city',
        'message',
    ];
}
