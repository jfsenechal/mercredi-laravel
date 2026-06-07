<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class SchoolGroup extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolGroupFactory> */
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasMany<Child, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(Child::class);
    }

    /**
     * @return HasMany<SchoolYear, $this>
     */
    public function schoolYears(): HasMany
    {
        return $this->hasMany(SchoolYear::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'min_age' => 'decimal:1',
            'max_age' => 'decimal:1',
            'position' => 'integer',
        ];
    }
}
