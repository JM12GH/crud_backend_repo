

@extends('layouts.app')

@section('content')
<div class="container fixed-content">
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Add New Book Category</h5>
            <a href="{{ route('book_categories.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('book_categories.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label"> Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@include('partials.notification')
@endsection
