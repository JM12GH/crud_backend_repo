<?php

namespace App\Services;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchService
{
    public function paginate(Request $request)
    {
        $perPage = $request->query('per_page', 6);
        return Branch::paginate($perPage);
    }

    public function create(array $data)
    {
        return Branch::create($data);
    }

    public function store(array $data)

    {
        return $this->create($data);
    }

    public function update(array $data, Branch $branch): Branch
    {
        $branch->update($data);
        return $branch;
    }

    public function delete(Branch $branch): void
    {
        $branch->delete();
    }

    public function show(string $id)
    {
        return Branch::findOrFail($id);
    }


}
