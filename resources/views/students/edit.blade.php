<!-- resources/views/students/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="fixed-card">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Edit Student</h5>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('students.update', $student->id) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-1">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $student->first_name }}" required>
                </div>
                
                <div class="mb-1">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $student->last_name }}" required>
                </div>
                
                <div class="mb-1">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year" value="{{ $student->year }}" required>
                </div>
                
                <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
                </div>
                
                <div class="mb-1">
                    <label for="is_approved" class="form-label">Is Approved</label>
                    <select class="form-select" id="is_approved" name="is_approved" required>
                        <option value="1" {{ $student->is_approved ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$student->is_approved ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                
                <div class="mb-1">
                    <label for="branch_id" class="form-label">Branch</label>
                    <select class="form-select" id="branch_id" name="branch_id" required>
                        <option value="">Select Branch</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $student->branch_id == $branch->id ? 'selected' : '' }}>
                                {{ $branch->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="student_category_id" class="form-label">Category</label>
                    <select class="form-select" id="student_category_id" name="student_category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $student->student_category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Books</label>
                    <div class="form-check">
                        @foreach($books as $book)
                            <input class="form-check-input" type="checkbox" id="book{{ $book->id }}" name="books[]" value="{{ $book->id }}" 
                                {{ $student->books->pluck('id')->contains($book->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="book{{ $book->id }}">
                                {{ $book->title }}
                            </label>
                            <br>
                        @endforeach
                    </div>
                </div> 
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>
@include('partials.notification')
@endsection
