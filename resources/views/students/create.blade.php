<!-- resources/views/students/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="fixed-card">
    <div class="card mt-2">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Add New Student</h5>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('students.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="is_approved" class="form-label">Is Approved</label>
                    <select class="form-select" id="is_approved" name="is_approved" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="branch_id" class="form-label">Branch</label>
                    <select class="form-select" id="branch_id" name="branch_id" required>
                        <option value="">Select Branch</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="student_category_id" class="form-label">Category</label>
                    <select class="form-select" id="student_category_id" name="student_category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Books</label>
                    <div class="form-check">
                        @foreach($books as $book)
                            <input class="form-check-input" type="checkbox" id="book{{ $book->id }}" name="books[]" value="{{ $book->id }}">
                            <label class="form-check-label" for="book{{ $book->id }}">
                                {{ $book->title }}
                            </label>
                            <br>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-4" style="z-index: 1050;">
   
    @if ($errors->any())
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
</div>
@endsection
