<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StudentRequest;
use App\Services\StudentService;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(protected StudentService $studentService)
    {
    }

    public function index(Request $request)
    {
        $branchId = $request->query('branch_id');
        $categoryId = $request->query('student_category_id');
        $year = $request->query('year');

        $students = $this->studentService->getStudents($branchId, $categoryId, $year);
        $formData = $this->studentService->getFormData();

        $data = [
            'students' => $students,
            'branchId' => $branchId,
            'categoryId' => $categoryId,
            'year' => $year,
            'branches' => $formData['branches'],
            'categories' => $formData['categories'],
            'years' => $formData['years'],
            'books' => $formData['books']
        ];

        return view('students.index', $data);
    }

    public function create()
    {
        $formData = $this->studentService->getFormData();
        return view('students.create', $formData);
    }

    public function store(StudentRequest $request)
    {
        $data = $request->validated();
        $this->studentService->store($data);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = $this->studentService->show($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = $this->studentService->show($id);
        $formData = $this->studentService->getFormData();

        $data = [
            'student' => $student,
            'branches' => $formData['branches'],
            'categories' => $formData['categories'],
            'years' => $formData['years'],
            'books' => $formData['books']
        ];

        return view('students.edit', $data);
    }

    public function update(StudentRequest $request, Student $student)
    {
        $data = $request->validated();
        $this->studentService->update($student, $data);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $this->studentService->delete($student);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
