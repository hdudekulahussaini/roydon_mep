<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StandardSection extends Model
{
    protected $fillable = [
        'title',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function standards(): HasMany
    {
        return $this->hasMany(Standard::class)
            ->orderBy('sort_order');
    }
}
