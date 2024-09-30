<?php

namespace App\Http\Controllers\Web;

use App\Models\StudentCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudentCategoryRequest;
use App\Services\StudentCategoryService;
use Illuminate\View\View;

class StudentCategoryController extends Controller
{
    public function __construct(protected StudentCategoryService $studentCategoryService)
    {
    }

    public function index(Request $request): View
    {
        $student_categories = $this->studentCategoryService->paginate($request);
        return view('student_categories.index', ['student_categories' => $student_categories]);
    }

    public function create(): View
    {
        return view('student_categories.create');
    }

    public function store(StudentCategoryRequest $request): RedirectResponse
    {
        $this->studentCategoryService->store($request->validated());

        return redirect()->route('student_categories.index')->with('success', 'Student Category added!');
    }

    public function show(string $id): View
    {
        $student_category = StudentCategory::find($id);
        if (!$student_category) {
            return redirect()->route('student_categories.index')->with('error', 'Student Category not found.');
        }
        return view('student_categories.show', ['student_category' => $student_category]);
    }

    public function edit(string $id): View
    {
        $student_category = StudentCategory::find($id);
        if (!$student_category) {
            return redirect()->route('student_categories.index')->with('error', 'Student Category not found.');
        }
        return view('student_categories.edit', ['student_category' => $student_category]);
    }

    public function update(StudentCategoryRequest $request, string $id): RedirectResponse
    {
        $student_category = StudentCategory::find($id);
        if (!$student_category) {
            return redirect()->route('student_categories.index')->with('error', 'Student Category not found.');
        }
        $this->studentCategoryService->update($request->validated(), $student_category);

        return redirect()->route('student_categories.index')->with('success', 'Student Category updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $student_category = StudentCategory::find($id);
        if (!$student_category) {
            return redirect()->route('student_categories.index')->with('error', 'Student Category not found.');
        }
        $this->studentCategoryService->delete($student_category);

        return redirect()->route('student_categories.index')->with('success', 'Student Category deleted!');
    }
}
