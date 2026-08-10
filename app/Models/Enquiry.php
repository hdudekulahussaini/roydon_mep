<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organisation',
        'email',
        'phone',
        'city',
        'bed_count',
        'project_type',
        'expected_programme',
        'details',
        'budget_range',
        'referral_source',
    ];
}
