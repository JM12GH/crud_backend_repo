<?php
namespace App\Http\Controllers\Web;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;
use App\Services\BranchService;
use Illuminate\View\View;

class BranchController extends Controller
{
    public function __construct(protected BranchService $branchService)
    {
    }

    public function index(Request $request): View
    {
        $branches = $this->branchService->paginate($request);
        return view('branches.index', compact('branches'));
    }

    public function create(): View
    {
        return view('branches.create');
    }

    public function store(BranchRequest $request): RedirectResponse
    {
        $this->branchService->store($request->validated());

        return redirect()->route('branches.index')->with('success', 'Branch added!');
    }

    public function show(string $id): View
    {
        $branch = $this->branchService->show($id);
        return view('branches.show', compact('branch'));
    }

    public function edit(string $id): View
    {
        $branch = $this->branchService->show($id);
        return view('branches.edit', compact('branch'));
    }

    public function update(BranchRequest $request, string $id): RedirectResponse
    {
        $branch = $this->branchService->show($id);
        $this->branchService->update($request->validated(), $branch);

        return redirect()->route('branches.index')->with('success', 'Branch updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $branch = $this->branchService->show($id);
        $this->branchService->delete($branch);

        return redirect()->route('branches.index')->with('success', 'Branch deleted!');
    }
}
