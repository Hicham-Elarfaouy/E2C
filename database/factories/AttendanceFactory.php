<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users_ids = [4, 5];
        return [
            'justify' => $this->faker->boolean(),
            'duration' => $this->faker->numberBetween(1, 6),
            'user_id' => $this->faker->randomElement($users_ids),
        ];
    }
}
