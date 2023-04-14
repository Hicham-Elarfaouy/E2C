<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClassroomSeeder::class,
            LevelSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SubjectSeeder::class,
            NoteSeeder::class,
            ResultSeeder::class,
            ExpenseSeeder::class,
            RevenueSeeder::class,
            RequestSeeder::class,
            AttendanceSeeder::class,
        ]);
    }
}
