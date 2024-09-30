<?php

namespace App\Services;

use App\Models\StudentCategory;
use Illuminate\Http\Request;

class StudentCategoryService
{
    public function paginate(Request $request)
    {
        $perPage = $request->query('per_page', 7);
        return StudentCategory::paginate($perPage);
    }

    public function create(array $data)
    {
        return StudentCategory::create($data);
    }

    public function store(array $data)
    {
        return $this->create($data);
    }

    public function update(array $data, StudentCategory $studentCategory): StudentCategory
    {
        $studentCategory->update($data);
        return $studentCategory;
    }

    public function show(int $id): ?StudentCategory
    {
        return StudentCategory::find($id);
    }

    public function delete(StudentCategory $studentCategory): void
    {
        $studentCategory->delete();
    }
}
