<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSubcategory extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'banner_image',
        'heading',
        'description',
        'images',
        'cta_phone',
        'offerings_title',
        'offerings_description',
        'offerings_icon',
        'offerings_sort_order',
        'compliance_title',
        'compliance_description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'offerings_title' => 'array',
            'offerings_description' => 'array',
            'offerings_icon' => 'array',
            'offerings_sort_order' => 'array',
            'status' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
