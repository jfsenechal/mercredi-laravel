<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class SchoolYear extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolYearFactory> */
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<SchoolGroup, $this>
     */
    public function schoolGroup(): BelongsTo
    {
        return $this->belongsTo(SchoolGroup::class);
    }

    /**
     * @return BelongsTo<SchoolYear, $this>
     */
    public function nextYear(): BelongsTo
    {
        return $this->belongsTo(self::class, 'next_year_id');
    }

    /**
     * @return HasMany<Child, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(Child::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'position' => 'integer',
        ];
    }
}
