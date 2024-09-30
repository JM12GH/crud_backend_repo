@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-3 fixed-content">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit Author</h5>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('authors.update', $author->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{ $author->first_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{ $author->last_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                               value="{{ $author->description }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    @include('partials.notification')
@endsection
