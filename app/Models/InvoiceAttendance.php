<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class InvoiceAttendance extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceAttendanceFactory> */
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<Invoice, $this>
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * @return BelongsTo<Reduction, $this>
     */
    public function reduction(): BelongsTo
    {
        return $this->belongsTo(Reduction::class);
    }

    /**
     * @return BelongsTo<Child, $this>
     */
    public function child(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'attendance_date' => 'date',
            'duration' => 'integer',
            'gross_cost' => 'decimal:2',
            'calculated_cost' => 'decimal:2',
            'is_pedagogical' => 'boolean',
            'position' => 'integer',
            'absent' => 'integer',
        ];
    }
}
