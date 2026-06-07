<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<Guardian, $this>
     */
    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Guardian::class);
    }

    /**
     * @return BelongsTo<Camp, $this>
     */
    public function camp(): BelongsTo
    {
        return $this->belongsTo(Camp::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return HasMany<InvoiceComplement, $this>
     */
    public function complements(): HasMany
    {
        return $this->hasMany(InvoiceComplement::class);
    }

    /**
     * @return HasMany<InvoiceReduction, $this>
     */
    public function reductions(): HasMany
    {
        return $this->hasMany(InvoiceReduction::class);
    }

    /**
     * @return HasMany<InvoicePayment, $this>
     */
    public function payments(): HasMany
    {
        return $this->hasMany(InvoicePayment::class);
    }

    /**
     * @return HasMany<InvoiceAttendance, $this>
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(InvoiceAttendance::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'invoiced_at' => 'datetime',
            'paid_at' => 'datetime',
            'sent_at' => 'datetime',
            'legacy_amount' => 'decimal:2',
            'legacy_closed' => 'boolean',
        ];
    }
}
