<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class HealthRecord extends Model
{
    /** @use HasFactory<\Database\Factories\HealthRecordFactory> */
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<Child, $this>
     */
    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }

    /**
     * @return HasMany<HealthAnswer, $this>
     */
    public function answers(): HasMany
    {
        return $this->hasMany(HealthAnswer::class);
    }
}
