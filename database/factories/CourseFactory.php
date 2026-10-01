<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Laravel Development',
                'PHP Programming',
                'Database Management',
                'Web Development',
                'Software Engineering',
            ]),

            'code' => fake()->unique()->bothify('CS-###'),
        ];
    }
}
