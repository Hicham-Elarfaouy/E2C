<?php

namespace Database\Seeders;

use App\Models\Ability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilitiesAdmin = [
//            'export users', 'index users', 'create users', 'store users', 'edit users', 'update users', 'update password users', 'delete users',
//            'export subjects', 'index subjects', 'store subjects', 'update subjects', 'delete subjects',
            'dashboard',
            'users',
            'user',
            'subjects',
            'classrooms',
            'schedules',
            'levels',
            'attendances',
            'revenues',
            'expenses',
            'notes',
            'results',
            'requests',
        ];

        foreach ($abilitiesAdmin as $ability) {
            Ability::create(['name' => $ability, 'role_id' => 2]);
        }


        $abilitiesAccountant = [
            'dashboard',
            'user',
            'revenues',
            'expenses',
        ];

        foreach ($abilitiesAccountant as $ability) {
            Ability::create(['name' => $ability, 'role_id' => 3]);
        }


        $abilitiesTeacher = [
            'user',
            'schedule',
            'notes',
            'results',
        ];

        foreach ($abilitiesTeacher as $ability) {
            Ability::create(['name' => $ability, 'role_id' => 4]);
        }


        $abilitiesStudent = [
            'user',
            'schedule',
            'request',
        ];

        foreach ($abilitiesStudent as $ability) {
            Ability::create(['name' => $ability, 'role_id' => 5]);
        }
    }
}
