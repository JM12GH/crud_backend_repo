@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-2 fixed-content">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Add New Author</h5>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('authors.store') }}">
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
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @include('partials.notification')
@endsection
