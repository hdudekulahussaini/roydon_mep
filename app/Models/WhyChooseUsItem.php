<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUsItem extends Model
{
    use HasFactory;

    protected $table = 'why_choose_us_items';

    protected $fillable = [
        'title',
        'description',
    ];
}
