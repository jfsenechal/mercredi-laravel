<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Guardian;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invoice>
 */
final class InvoiceFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'guardian_id' => Guardian::factory(),
            'invoiced_at' => $this->faker->dateTimeThisYear(),
            'month' => $this->faker->monthName(),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'street' => $this->faker->streetAddress(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'communication' => $this->faker->unique()->numerify('+++/####/#####+++'),
        ];
    }
}
