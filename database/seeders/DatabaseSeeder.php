<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BranchSeeder::class,
            StudentCategorySeeder::class,
            AuthorSeeder::class,
            BookCategorySeeder::class,
            BookSeeder::class,
            StudentSeeder::class,

        ]);
    }
}
