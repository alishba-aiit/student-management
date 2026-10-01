<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        // Teacher
        $teacherUser = User::create([
            'name' => 'Teacher User',
            'email' => 'teacher@example.com',
            'password' => 'password',
            'role' => 'teacher',
        ]);

        $teacherUser->teacher()->create([
            'name' => $teacherUser->name,
            'email' => $teacherUser->email,
            'specialization' => 'Laravel Development',
        ]);

        // Student
        $studentUser = User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => 'password',
            'role' => 'student',
        ]);

        $studentUser->student()->create([
            'name' => $studentUser->name,
            'email' => $studentUser->email,
        ]);
    }
}