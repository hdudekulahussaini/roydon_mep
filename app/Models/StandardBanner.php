<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'alt_text',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
