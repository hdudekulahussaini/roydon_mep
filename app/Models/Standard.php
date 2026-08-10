<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Standard extends Model
{
    protected $fillable = [
        'standard_section_id',
        'icon',
        'abbr',
        'title',
        'description',
        'applied_to',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(
            StandardSection::class,
            'standard_section_id'
        );
    }
}
