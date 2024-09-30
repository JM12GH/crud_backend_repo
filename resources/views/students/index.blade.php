@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3 fixed-content">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Student List</h5>
            <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('students.index') }}" class="mb-2 bg-secondary text-white p-3 rounded">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span>Filter by</span>
                    </div>
                    <div class="col-auto">
                        <div id="filterOptions" class="collapse {{ request()->hasAny(['branch_id', 'student_category_id', 'year']) ? 'show' : '' }}">
                            <div class="row">
                                <div class="col">
                                    <select class="form-select" id="branch_id" name="branch_id" onchange="this.form.submit()">
                                        <option value="">All Branches</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}" {{ $branchId == $branch->id ? 'selected' : '' }}>
                                                {{ $branch->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" id="student_category_id" name="student_category_id" onchange="this.form.submit()">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" id="year" name="year" onchange="this.form.submit()">
                                        <option value="">All Years</option>
                                        @foreach($years as $y)
                                            <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                                {{ $y }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col ms-auto text-end">
                        <a href="#" id="toggle-filters" class="text-white" data-bs-toggle="collapse" data-bs-target="#filterOptions">
                            {{ request()->hasAny(['branch_id', 'student_category_id', 'year']) ? '- Hide filters' : '+ Show filters' }}
                        </a>
                    </div>
                </div>
            </form>
            
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Approved</th>
                            <th>Branch</th>
                            <th>Category</th>
                            <th>Books</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->year }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->is_approved ? 'Yes' : 'No' }}</td>
                                <td>{{ $student->branch->name ?? 'N/A' }}</td>
                                <td>{{ $student->studentCategory->name ?? 'N/A' }}</td>
                                <td>
                                    @if($student->books->isEmpty())
                                    N/A
                                @else
                                    @php
                                        $bookTitles = $student->books->pluck('title')->toArray();
                                        $chunkedTitles = array_chunk($bookTitles, 2); // Split titles into chunks of 2
                                    @endphp
                                
                                    @foreach($chunkedTitles as $chunk)
                                        <div>
                                            @foreach($chunk as $title)
                                                {{ $title }}@if(!$loop->last), @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endif
                                
                                </td>
                                <td>
                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm" title="View Student">View</a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm" title="Edit Student">Edit</a>
                                    <form method="POST" action="{{ route('students.destroy', $student->id) }}" accept-charset="UTF-8" style="display:inline" id="delete-form-{{ $student->id }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#confirmDeleteModal"
                                                data-id="{{ $student->id }}" 
                                                data-type="student"
                                                data-url="{{ route('students.destroy', $student->id) }}"
                                                title="Delete Student">Delete</button>
                                    </form>
                                    
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $students->appends(['branch_id' => request('branch_id'), 'student_category_id' => request('student_category_id'), 'year' => request('year')])->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@include('partials.notification')
@endsection

