<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class HealthQuestion extends Model
{
    /** @use HasFactory<\Database\Factories\HealthQuestionFactory> */
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasMany<HealthAnswer, $this>
     */
    public function answers(): HasMany
    {
        return $this->hasMany(HealthAnswer::class, 'question_id');
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'has_complement' => 'boolean',
            'display_order' => 'integer',
        ];
    }
}
