<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}