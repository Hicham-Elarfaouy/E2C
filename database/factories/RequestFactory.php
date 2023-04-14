<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
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
            'type' => 'IDK',
            'solve' => $this->faker->boolean(),
            'description' => $this->faker->realText(),
            'user_id' => $this->faker->randomElement($users_ids),
        ];
    }
}
