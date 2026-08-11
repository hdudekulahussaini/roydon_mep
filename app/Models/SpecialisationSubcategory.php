<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialisationSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'banner_tags',
        'banner_image',
        'image',
        'description',
        'features_heading',
        'features_description',
        'tags',
        'seo_text',
        'status',
    ];

    protected $casts = [
        'banner_tags' => 'array',
        'features_heading' => 'array',
        'features_description' => 'array',
        'tags' => 'array',
        'status' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}