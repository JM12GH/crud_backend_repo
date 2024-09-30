<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCategoryRequest;
use App\Http\Resources\StudentCategoryResource;
use App\Models\StudentCategory;
use App\Services\StudentCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StudentCategoryController extends Controller
{
    public function __construct(protected StudentCategoryService $studentcategoryService)
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $studentcategories = $this->studentcategoryService->paginate($request);
        return StudentCategoryResource::collection($studentcategories);
    }

    public function store(StudentCategoryRequest $request): StudentCategoryResource
    {
        $studentcategory = $this->studentcategoryService->store($request->validated());
        return new StudentCategoryResource($studentcategory);
    }

    public function show($id): StudentCategoryResource
    {
        $studentCategory = StudentCategory::findOrFail($id);
        return new StudentCategoryResource($studentCategory);
    }

    public function update(StudentCategoryRequest $request, $id): StudentCategoryResource
    {
        $studentCategory = StudentCategory::findOrFail($id);
        $updatedCategory = $this->studentcategoryService->update($request->validated(), $studentCategory);
        return new StudentCategoryResource($updatedCategory);
    }

    public function destroy($id): JsonResponse
    {
        $studentCategory = StudentCategory::findOrFail($id);
        $this->studentcategoryService->delete($studentCategory);
        return response()->json(['message' => 'Student category deleted successfully'], 204);
    }
}
