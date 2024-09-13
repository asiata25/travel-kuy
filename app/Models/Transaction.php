<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    function package() : BelongsTo {
        return $this->belongsTo(HolidayPackage::class);
    }

    function variant() : BelongsTo {
        return $this->belongsTo(PackageVariant::class);
    }
}
