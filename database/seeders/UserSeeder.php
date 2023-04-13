<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Boss Hicham',
            'email' => 'boss@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'CIN' => 'SJ30123',
            'username' => 'bosshicham',
            'birthday' => '2007-01-10',
            'gender' => 'men',
            'phone' => '+212681828384',
            'address' => '6466 Yundt Flat Suite 739 North Evelinemouth, MS 33758',
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Admin Hicham',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'CIN' => 'SJ30456',
            'username' => 'adminhicham',
            'birthday' => '2007-01-10',
            'gender' => 'men',
            'phone' => '+212681828384',
            'address' => '6466 Yundt Flat Suite 739 North Evelinemouth, MS 33758',
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Accountant Hicham',
            'email' => 'accountant@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'CIN' => 'SJ30789',
            'username' => 'accountanthicham',
            'birthday' => '2007-01-10',
            'gender' => 'men',
            'phone' => '+212681828384',
            'address' => '6466 Yundt Flat Suite 739 North Evelinemouth, MS 33758',
            'role_id' => 3,
        ]);

        User::create([
            'name' => 'Teacher Hicham',
            'email' => 'teacher@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'CIN' => 'SJ30012',
            'username' => 'teacherhicham',
            'birthday' => '2007-01-10',
            'gender' => 'men',
            'phone' => '+212681828384',
            'address' => '6466 Yundt Flat Suite 739 North Evelinemouth, MS 33758',
            'role_id' => 4,
        ]);

        User::create([
            'name' => 'Student Hicham',
            'email' => 'student@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'CIN' => 'SJ30345',
            'CNE' => 'C1324567890',
            'username' => 'studenthicham',
            'birthday' => '2007-01-10',
            'gender' => 'men',
            'phone' => '+212681828384',
            'address' => '6466 Yundt Flat Suite 739 North Evelinemouth, MS 33758',
            'parent_name' => 'Khadija',
            'parent_relation' => 'mother',
            'parent_phone' => '+212681828384',
            'role_id' => 5,
            'classroom_id' => 1,
            'level_id' => 1,
        ]);
    }
}
