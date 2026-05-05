<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing users first
        User::truncate();

        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Teacher User
        User::create([
            'name' => 'Teacher User',
            'email' => 'teacher@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'teacher'
        ]);

        // Student User
        User::create([
            'name' => 'Student User',
            'email' => 'student@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);
    }
}