<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects_ids = DB::table('subjects')->pluck('id')->toArray();
        return [
            'amount' => $this->faker->randomFloat(2, 1, 10000),
            'type' => 'IDK',
            'description' => $this->faker->realText(),
            'subject_id' => $this->faker->randomElement($subjects_ids),
        ];
    }
}
