<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorController extends Controller
{
    public function __construct(protected AuthorService $authorService)
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $authors = $this->authorService->paginate($request);
        return AuthorResource::collection($authors);
    }

    public function store(AuthorRequest $request): AuthorResource
    {
        $author = $this->authorService->store($request->validated());
        return new AuthorResource($author);
    }

    public function show(Author $author): AuthorResource
    {
        return new AuthorResource($author);
    }

    public function update(AuthorRequest $request, Author $author): AuthorResource
    {
        $updatedAuthor = $this->authorService->update($request->validated(), $author);
        return new AuthorResource($updatedAuthor);
    }

    public function destroy(Author $author): JsonResponse
    {
        $this->authorService->delete($author);
        return response()->json(null);
    }
}
