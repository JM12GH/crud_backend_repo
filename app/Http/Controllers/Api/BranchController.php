<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Services\BranchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BranchController extends Controller
{
    public function __construct(protected BranchService $branchService)
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $branches = $this->branchService->paginate($request);
        return BranchResource::collection($branches);
    }

    public function store(BranchRequest $request): BranchResource
    {
        $branch = $this->branchService->store($request->validated());
        return new BranchResource($branch);
    }

    public function show(Branch $branch): BranchResource
    {
        return new BranchResource($branch);
    }

    public function update(BranchRequest $request, Branch $branch): BranchResource
    {
        $updatedBranch = $this->branchService->update($request->validated(), $branch);
        return new BranchResource($updatedBranch);
    }

    public function destroy(Branch $branch): JsonResponse
    {
        $this->branchService->delete($branch);
        return response()->json(null);
    }
}
