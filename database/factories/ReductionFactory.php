<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Reduction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reduction>
 */
final class ReductionFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'amount' => $this->faker->randomFloat(2, 1, 20),
            'percentage' => null,
            'is_flat_rate' => false,
        ];
    }
}
