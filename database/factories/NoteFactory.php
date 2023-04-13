<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
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
            'note' => $this->faker->randomFloat(2,0, 20),
            'subject_id' => $this->faker->randomElement($subjects_ids),
            'user_id' => 5,
        ];
    }
}
