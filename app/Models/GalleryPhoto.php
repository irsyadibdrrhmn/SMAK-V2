<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'photo',
        'album',
        'event_date',
        'is_published',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
