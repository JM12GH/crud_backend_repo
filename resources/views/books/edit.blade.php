<!-- resources/views/students/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
 <div class="card mt-3 fixed-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Edit Book</h5>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                 
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}"required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $book->description }}</textarea>
                </div>
                
                
                <div class="mb-3">
                    <label for="shelf_number" class="form-label">Shelf Number</label>
                    <input type="text" class="form-control" id="shelf_number" name="shelf_number"  value="{{ $book->shelf_number }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="preview_photo" class="form-label">Preview Photo</label>
                    <input type="file" class="form-control" id="preview_photo" name="preview_photo">
                    @if($book->preview_photo)
                        <small class="form-text text-muted">Current file: {{ $book->preview_photo }}</small>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label for="total_nr_of_copies" class="form-label">Total Number of Copies</label>
                    <input type="number" class="form-control" id="total_nr_of_copies" name="total_nr_of_copies"  value="{{ $book->total_nr_of_copies }}" required>
                </div>
                <div class="mb-3">
                    <label for="book_category_id" class="form-label">Category</label>
                    <select class="form-select" id="book_category_id" name="book_category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $book->book_category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                
                <div class="mb-3">
                    <label class="form-label">Authors</label>
                    <div class="form-check">
                        @foreach($authors as $author)
                            <input class="form-check-input" type="checkbox" id="author{{ $author->id }}" name="authors[]" value="{{ $author->id }}"
                                
                            {{ $book->authors->contains($author->id) ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="author{{ $author->id }}">
                                {{ $author->first_name }} {{ $author->last_name }}
                            </label>
                            <br>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div> 
</div>
@include('partials.notification')
@endsection
