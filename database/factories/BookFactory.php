<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        $files = Storage::files('public/preview_photos');

        return [
            'title' => $this->faker->sentence,
            'description' => substr($this->faker->optional()->paragraph, 0, 35),
            'shelf_number' => $this->faker->numberBetween(1, 99),
            'preview_photo' => !empty($files) ? str_replace('public/', '', $this->faker->randomElement($files)) : null,
            'total_nr_of_copies' => $this->faker->numberBetween(1, 20),

        ];
    }


}
