<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAchievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'level',
        'achievement_date',
        'photo',
        'is_featured',
    ];

    protected $casts = [
        'achievement_date' => 'date',
    ];
}
