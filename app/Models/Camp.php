<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Camp extends Model
{
    /** @use HasFactory<\Database\Factories\CampFactory> */
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasMany<Day, $this>
     */
    public function days(): HasMany
    {
        return $this->hasMany(Day::class);
    }

    /**
     * @return HasMany<Invoice, $this>
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_archived' => 'boolean',
        ];
    }
}
