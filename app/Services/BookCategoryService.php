<?php

namespace App\Services;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryService
{
    public function paginate(Request $request)
    {
        $perPage = $request->query('per_page', 7);
        return BookCategory::paginate($perPage);
    }

    public function create(array $data)
    {
        return BookCategory::create($data);
    }

    public function store(array $data)
    {
        return $this->create($data);
    }

    public function update(array $data, BookCategory $bookCategory): BookCategory
    {
        $bookCategory->update($data);
        return $bookCategory;
    }

    public function show(int $id): ?BookCategory
    {
        return BookCategory::find($id);
    }

    public function delete(BookCategory $bookCategory): void
    {
        $bookCategory->delete();
    }


}
