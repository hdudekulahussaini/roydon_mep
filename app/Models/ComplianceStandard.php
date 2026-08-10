<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplianceStandard extends Model
{
    protected $fillable = [
        'category',
        'icon',
        'abbr',
        'title',
        'description',
        'applied_to',
    ];
}
