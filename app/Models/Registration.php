<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'gstin',
        'country',
        'company_name',
        'industry',
        'city',
        'pincode',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'business_address',
        'no_of_users',
    ];

    public $timestamps = true;
}
