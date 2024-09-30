<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorService
{
    public function paginate(Request $request)
    {
        $perPage = $request->query('per_page', 7);
        return Author::paginate($perPage);
    }

    public function create(array $data)
    {
        return Author::create($data);
    }

    public function store(array $data)
    {
        return $this->create($data);
    }

    public function update(array $data, Author $author): Author
    {
        $author->update($data);
        return $author;
    }


    public function show(int $id): ?Author
    {
        return Author::find($id);
    }

    public function delete(Author $author): void
    {
        $author->delete();
    }
}
