<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
           'name' => 'Boss'
        ]);

        Role::create([
           'name' => 'Administration'
        ]);

        Role::create([
           'name' => 'Accountant'
        ]);

        Role::create([
           'name' => 'Teacher'
        ]);

        Role::create([
           'name' => 'Student'
        ]);
    }
}
