<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Book;
use App\Models\StudentCategory;
use App\Models\Branch;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $books = Book::all();
        $studentCategories = StudentCategory::all();
        $branches = Branch::all();

        Student::factory()
            ->count(10)
            ->create()
            ->each(fn(Student $student) => $this->attachRelations($student, $books, $studentCategories, $branches));
    }

    protected function attachRelations(Student $student, $books, $studentCategories, $branches): void
    {
        $student->books()->attach(
            $books->random(2)->pluck('id')->toArray()
        );

        $category = $studentCategories->random();

        $student->studentCategory()->associate($category);
        $student->save();

        $branch = $branches->random();

        $student->branch()->associate($branch);
        $student->save();
    }
}
