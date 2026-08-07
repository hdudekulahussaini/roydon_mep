<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'count',
        'title',
        'description',
    ];
}
