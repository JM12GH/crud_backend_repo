<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::all();
        $bookCategories = BookCategory::all();

        Book::factory()
            ->count(10)
            ->create()
            ->each(fn(Book $book) => $this->attachRelations($book, $authors, $bookCategories));
    }

    protected function attachRelations(Book $book, $authors, $bookCategories): void
    {
        $book->authors()->attach(
            $authors->random(2)->pluck('id')->toArray()
        );

        $bookcategory = $bookCategories->random();
        $book->bookCategory()->associate($bookcategory);
        $book->save();


    }
}
