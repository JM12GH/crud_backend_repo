<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentCategory;

class StudentCategorySeeder extends Seeder
{
    public function run(): void
    {
        StudentCategory::factory()->count(10) ->create();
    }
}
