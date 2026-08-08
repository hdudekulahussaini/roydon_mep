<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'description',
        'small_title',
        'features',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'sort_order' => 'integer',
    ];
}
