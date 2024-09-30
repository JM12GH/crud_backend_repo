<?php

namespace App\Services;

use App\Models\Author;
use App\Models\BookCategory;
use App\Models\Book;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class BookService
{
    public function getBooks($categoryId): LengthAwarePaginator
    {
        return Book::with(['bookCategory', 'authors'])
            ->when($categoryId, fn($query) => $query->whereHas('bookCategory', fn($query) => $query->where('id', $categoryId)))
            ->paginate(4);
    }

    public function getFormData(): array
    {
        return [
            'authors' => Author::all(),
            'categories' => BookCategory::all(),

        ];
    }

    public function create($data): Book
    {
        if (isset($data['preview_photo'])) {
            $data['preview_photo'] = $data['preview_photo']->store('preview_photos', 'public');
        }

        $book = new Book($data);
        $book->bookCategory()->associate($data['book_category_id']);
        $book->save();

        if (isset($data['authors'])) {
            $book->authors()->sync($data['authors']);
        }

        return $book;
    }

    public function update(Book $book, $data): Book
    {
        if (isset($data['preview_photo'])) {

            if ($book->preview_photo) {
                Storage::disk('public')->delete($book->preview_photo);
            }
            $data['preview_photo'] = $data['preview_photo']->store('preview_photos', 'public');
        }


        $book->update($data);
        $book->bookCategory()->associate($data['book_category_id']);
        $book->save();

        if (isset($data['authors'])) {
            $book->authors()->sync($data['authors']);
        }

        return $book;
    }


    public function delete(Book $book): void
    {
        $book->delete();
    }

    public function store($book): Book
    {
        return $this->create($book);
    }

    public function show($id)
    {
        return Book::with(['bookCategory', 'authors'])->findOrFail($id);
    }
}
