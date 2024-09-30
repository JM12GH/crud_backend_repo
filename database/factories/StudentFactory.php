<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'year' => $this->faker->year,
            'email' => $this->faker->unique()->safeEmail,
            'is_approved' => $this->faker->boolean,
        ];
    }


}
