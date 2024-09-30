<?php

namespace App\Http\Controllers\Web;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Services\AuthorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorController extends Controller
{
 public function __construct( protected AuthorService $authorService)
    {
    }
   
   public function index(Request $request): View
    {
        $authors = $this->authorService->paginate($request);
        return view('authors.index', compact('authors'));
    }

    public function create(): View
    {
        return view('authors.create');
    }

    public function store(AuthorRequest $request): RedirectResponse
    {
        $this->authorService->store($request->validated());

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    public function show(int $id): View
    {
        $author = $this->authorService->show($id);
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author): View
    {
        return view('authors.edit', compact('author'));
    }

    public function update(AuthorRequest $request, Author $author): RedirectResponse
    {
        $this->authorService->update($request->validated(), $author);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author): RedirectResponse
    {
        $this->authorService->delete($author);

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
