<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Branch;
use App\Models\StudentCategory;
use App\Models\Book;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentService
{
    public function getStudents($branchId, $categoryId, $year): LengthAwarePaginator
    {
        return Student::with(['branch', 'studentCategory', 'books'])
            ->when($branchId, fn($query) => $query->whereHas('branch', fn($query) => $query->where('id', $branchId)))
            ->when($categoryId, fn($query) => $query->whereHas('studentCategory', fn($query) => $query->where('id', $categoryId)))
            ->when($year, fn($query) => $query->where('year', $year))
            ->paginate(5);
    }

    public function getFormData(): array
    {
        return [
            'branches' => Branch::all(),
            'categories' => StudentCategory::all(),
            'years' => Student::select('year')->distinct()->orderBy('year', 'desc')->pluck('year'),
            'books' => Book::all()
        ];
    }

    public function create($data): Student
    {
        $student = new Student($data);
        $student->branch()->associate($data['branch_id']);
        $student->studentCategory()->associate($data['student_category_id']);
        $student->save();

        if (isset($data['books'])) {
            $student->books()->sync($data['books']);
        }

        return $student;
    }

    public function update(Student $student, $data): Student
    {
        $student->update($data);
        $student->branch()->associate($data['branch_id']);
        $student->studentCategory()->associate($data['student_category_id']);
        $student->save();

        if (isset($data['books'])) {
            $student->books()->sync($data['books']);
        }

        return $student;
    }

    public function delete(Student $student): void
    {
        $student->delete();
    }

    public function store($data): Student
    {
        return $this->create($data);
    }

    public function show($id)
    {
        return Student::with(['branch', 'studentCategory', 'books'])->findOrFail($id);
    }
}
