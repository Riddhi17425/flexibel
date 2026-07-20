<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudyForm extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'casestudy_form';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'fullname',
    'mobile',
    'email',
    'message',
    'country',
    ];
}
