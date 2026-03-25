<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'tagline',
        'principal_name',
        'principal_photo',
        'logo',
        'history',
        'vision',
        'mission',
        'address',
        'phone',
        'email',
        'maps_embed',
    ];
}
