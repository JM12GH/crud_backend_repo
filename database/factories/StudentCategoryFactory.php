<?php

namespace Database\Factories;

use App\Models\StudentCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentCategoryFactory extends Factory
{
    protected $model = StudentCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'max_allow' => $this->faker->numberBetween(1, 10),
        ];
    }
}
