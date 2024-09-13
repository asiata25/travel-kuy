<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    function childs(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    function packages(): BelongsToMany
    {
        return $this->belongsToMany(HolidayPackage::class, foreignPivotKey: 'category_id');
    }
}
