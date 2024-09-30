<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookController extends Controller
{
    public function __construct(protected BookService $bookService)
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $categoryId = $request->query('book_category_id');
        $books = $this->bookService->getBooks($categoryId);
        return BookResource::collection($books);
    }

    public function store(BookRequest $request): BookResource
    {
        $book = $this->bookService->store($request->validated());
        return new BookResource($book);
    }

    public function show(Book $book): BookResource
    {
        return new BookResource($this->bookService->show($book->id));
    }

    public function update(BookRequest $request, Book $book): BookResource
    {
        $updatedBook = $this->bookService->update($book, $request->validated());
        return new BookResource($updatedBook);
    }

    public function destroy(Book $book): JsonResponse
    {
        $this->bookService->delete($book);
        return response()->json(null, 204);
    }
}
