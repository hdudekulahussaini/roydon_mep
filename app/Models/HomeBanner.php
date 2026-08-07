<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'background_image',
        'specializations',

        'iso_9001_title',
        'iso_9001_image',

        'iso_14001_title',
        'iso_14001_image',

        'iso_45001_title',
        'iso_45001_image',
    ];

    protected $casts = [
        'specializations' => 'array',
    ];
}