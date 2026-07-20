<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobForm extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'job_form';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'fullname',
    'year',
    'phone',
    'email',
    'message',
    'resume',
    'applied_for'
    ];
}
