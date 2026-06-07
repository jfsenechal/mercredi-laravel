<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Child>
 */
final class ChildFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'birth_date' => $this->faker->dateTimeBetween('-12 years', '-3 years'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'position' => 0,
            'is_photo_authorized' => $this->faker->boolean(),
            'is_archived' => false,
            'is_school_reception' => false,
        ];
    }
}
