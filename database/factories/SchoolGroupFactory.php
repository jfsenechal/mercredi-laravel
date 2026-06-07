<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SchoolGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SchoolGroup>
 */
final class SchoolGroupFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'short_name' => $this->faker->word(),
            'min_age' => $this->faker->numberBetween(2, 6),
            'max_age' => $this->faker->numberBetween(7, 12),
            'position' => $this->faker->numberBetween(0, 10),
        ];
    }
}
