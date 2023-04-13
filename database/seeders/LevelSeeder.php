<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create([
           'name' => '1ere Primaire',
        ]);

        Level::create([
           'name' => '2eme Primaire',
        ]);

        Level::create([
           'name' => '3eme Primaire',
        ]);

        Level::create([
           'name' => '4eme Primaire',
        ]);

        Level::create([
           'name' => '5eme Primaire',
        ]);

        Level::create([
           'name' => '6eme Primaire',
        ]);

        Level::create([
           'name' => '1ere College',
        ]);

        Level::create([
           'name' => '2eme College',
        ]);

        Level::create([
           'name' => '3eme College',
        ]);

        Level::create([
           'name' => '1ere Lycee',
        ]);

        Level::create([
           'name' => '2eme Lycee',
        ]);

        Level::create([
           'name' => '3eme Lycee',
        ]);
    }
}
