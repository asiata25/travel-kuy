<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['name', 'slug', 'parent_id', 'is_visible', 'description'];

    function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    function childs(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    function packages() : HasMany {
        return $this->hasMany(HolidayPackage::class);
    }
}
