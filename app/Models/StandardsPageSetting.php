<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandardsPageSetting extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'banner_image'
    ];
}
