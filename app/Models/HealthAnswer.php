<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class HealthAnswer extends Model
{
    /** @use HasFactory<\Database\Factories\HealthAnswerFactory> */
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<HealthRecord, $this>
     */
    public function healthRecord(): BelongsTo
    {
        return $this->belongsTo(HealthRecord::class);
    }

    /**
     * @return BelongsTo<HealthQuestion, $this>
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(HealthQuestion::class, 'question_id');
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'answer' => 'boolean',
        ];
    }
}
