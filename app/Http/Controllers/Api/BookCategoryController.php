<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCategoryRequest;
use App\Http\Resources\BookCategoryResource;
use App\Models\BookCategory;
use App\Services\BookCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookCategoryController extends Controller
{
    public function __construct(protected BookCategoryService $bookcategoryService)
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $bookcategories = $this->bookcategoryService->paginate($request);
        return BookCategoryResource::collection($bookcategories);
    }

    public function store(BookCategoryRequest $request): BookCategoryResource
    {
        $bookcategory = $this->bookcategoryService->store($request->validated());
        return new BookCategoryResource($bookcategory);
    }

    public function show($id): BookCategoryResource
    {
        $bookCategory = BookCategory::findOrFail($id);
        return new BookCategoryResource($bookCategory);
    }

    public function update(BookCategoryRequest $request, $id): BookCategoryResource
    {
        $bookCategory = BookCategory::findOrFail($id);
        $updatedCategory = $this->bookcategoryService->update($request->validated(), $bookCategory);
        return new BookCategoryResource($updatedCategory);
    }

    public function destroy($id): JsonResponse
    {
        $bookCategory = BookCategory::findOrFail($id);
        $this->bookcategoryService->delete($bookCategory);
        return response()->json(null, 204);
    }
}
