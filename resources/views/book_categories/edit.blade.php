@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3 fixed-content">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Edit Book Category</h5>
            <a href="{{ route('book_categories.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('book_categories.update', $bookCategory->id) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $bookCategory->name }}" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@include('partials.notification')
@endsection
