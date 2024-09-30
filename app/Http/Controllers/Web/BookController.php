<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\BookRequest;
use App\Services\BookService;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct( protected BookService $bookService)
    {
    }

    public function index(Request $request)
    {
         $categoryId = $request->query('book_category_id');
         $books = $this->bookService->getBooks($categoryId);
         $formData = $this->bookService->getFormData();

        $data = [
            'books' => $books,
            'categoryId' => $categoryId,
            'categories' => $formData['categories'],
            'authors' => $formData['authors']
        ];

        return view('books.index', $data);
    }

    public function create()
    {
        $formData = $this->bookService->getFormData();
        return view('books.create', $formData);
    }

   public function store(BookRequest $request)
{
    $data = $request->validated();
    if ($request->hasFile('preview_photo')) {
        $data['preview_photo'] = $request->file('preview_photo');
    }
    $this->bookService->store($data);

    return redirect()->route('books.index')->with('success', 'Book created successfully.');
}
    public function show($id)
    {
        $book = $this->bookService->show($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = $this->bookService->show($id);
        $formData = $this->bookService->getFormData();

        $data = [
            'book' => $book,
            'categories' => $formData['categories'],
            'authors' => $formData['authors']
        ];

        return view('books.edit', $data);
    }

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        $this->bookService->update($book, $data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $this->bookService->delete($book);
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
