<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HolidayPackage extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, foreignPivotKey: 'package_id');
    }

    function variants(): HasMany
    {
        return $this->hasMany(PackageVariant::class);
    }
}
