<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'name' => 'Laravel Development',
            'code' => 'LAR-101',
        ]);

        Course::create([
            'name' => 'PHP Programming',
            'code' => 'PHP-101',
        ]);

        Course::create([
            'name' => 'Database Management',
            'code' => 'DB-101',
        ]);

        Course::create([
            'name' => 'Web Development',
            'code' => 'WEB-101',
        ]);

        Course::create([
            'name' => 'Software Engineering',
            'code' => 'SE-101',
        ]);
    }
}