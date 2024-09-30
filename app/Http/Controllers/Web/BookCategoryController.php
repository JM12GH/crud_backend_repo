<?php
namespace App\Http\Controllers\Web;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\BookCategory;
use App\Http\Requests\BookCategoryRequest;
use App\Services\BookCategoryService;
use Illuminate\View\View;

class BookCategoryController extends Controller
{
    public function __construct(protected BookCategoryService $bookCategoryService)
    {
    }

    public function index(Request $request): View
    {
        $categories = $this->bookCategoryService->paginate($request);
        return view('book_categories.index', ['categories' => $categories]);
    }

    public function create(): View
    {
        return view('book_categories.create');
    }

    public function store(BookCategoryRequest $request): RedirectResponse
    {
        $this->bookCategoryService->store($request->validated());

        return redirect()->route('book_categories.index')->with('success', 'Book category created successfully.');
    }

    public function show(string $id): View
    {
        $bookCategory = BookCategory::find($id);
        if (!$bookCategory) {
            return redirect()->route('book_categories.index')->with('error', 'Book Category not found.');
        }
        return view('book_categories.show', ['bookCategory' => $bookCategory]);
    }

    public function edit(int $id): View
    {
        $bookCategory = BookCategory::find($id);
        if (!$bookCategory) {
            return redirect()->route('book_categories.index')->with('error', 'Book Category not found.');
        }
        return view('book_categories.edit', ['bookCategory' => $bookCategory]);
    }

    public function update(BookCategoryRequest $request, int $id): RedirectResponse
    {
        $bookCategory = BookCategory::find($id);
        if (!$bookCategory) {
            return redirect()->route('book_categories.index')->with('error', 'Book Category not found.');
        }
        $this->bookCategoryService->update($request->validated(), $bookCategory);

        return redirect()->route('book_categories.index')->with('success', 'Book Category updated!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $bookCategory = BookCategory::find($id);
        if (!$bookCategory) {
            return redirect()->route('book_categories.index')->with('error', 'Book Category not found.');
        }
        $this->bookCategoryService->delete($bookCategory);

        return redirect()->route('book_categories.index')->with('success', 'Book Category deleted!');
    }
}
