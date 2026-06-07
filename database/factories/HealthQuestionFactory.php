<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\HealthQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HealthQuestion>
 */
final class HealthQuestionFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence().'?',
            'has_complement' => false,
            'display_order' => $this->faker->numberBetween(0, 20),
            'category' => $this->faker->randomElement(['allergy', 'medication', 'diet', 'general']),
        ];
    }
}
