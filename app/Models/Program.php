<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'order',
        'is_active',
        'metadata'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'metadata' => 'array',
        'order' => 'integer'
    ];

    protected $appends = ['image_url'];

    /**
     * Get the image URL
     */
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return null;
        }
        
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        
        return asset('storage/' . $this->image);
    }

    /**
     * Scope a query to only include active programs.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order by the order field.
     */
    public function scopeOrdered($query, $direction = 'asc')
    {
        return $query->orderBy('order', $direction);
    }
}
