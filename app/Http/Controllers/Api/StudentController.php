<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StudentController extends Controller
{
    public function __construct(protected StudentService $studentService)
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $branchId = $request->query('branch_id');
        $categoryId = $request->query('student_category_id');
        $year = $request->query('year');

        $students = $this->studentService->getStudents($branchId, $categoryId, $year);
        return StudentResource::collection($students);
    }

    public function store(StudentRequest $request): StudentResource
    {
        $student = $this->studentService->store($request->validated());
        return new StudentResource($student);
    }

    public function show(Student $student): StudentResource
    {
        return new StudentResource($this->studentService->show($student->id));
    }

    public function update(StudentRequest $request, Student $student): StudentResource
    {
        $updatedStudent = $this->studentService->update($student, $request->validated());
        return new StudentResource($updatedStudent);
    }

    public function destroy(Student $student): JsonResponse
    {
        $this->studentService->delete($student);
        return response()->json(null, 204);
    }
}
