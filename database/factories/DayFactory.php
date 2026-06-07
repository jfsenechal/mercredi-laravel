<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Day;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Day>
 */
final class DayFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('now', '+3 months'),
            'price1' => $this->faker->randomFloat(2, 2, 10),
            'price2' => $this->faker->randomFloat(2, 2, 10),
            'price3' => $this->faker->randomFloat(2, 2, 10),
            'flat_rate' => 0,
            'color' => $this->faker->hexColor(),
            'is_archived' => false,
            'is_pedagogical' => false,
        ];
    }
}
