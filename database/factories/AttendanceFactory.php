<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Child;
use App\Models\Day;
use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Attendance>
 */
final class AttendanceFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'guardian_id' => Guardian::factory(),
            'child_id' => Child::factory(),
            'day_id' => Day::factory(),
            'absent' => 0,
            'position' => 0,
            'is_half_day' => false,
            'is_confirmed' => false,
        ];
    }
}
