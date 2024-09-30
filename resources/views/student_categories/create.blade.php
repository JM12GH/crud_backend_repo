@extends('layouts.app')

@section('content')

<div class="container">
        <div class="card mt-3 fixed-content">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Add Student Category</h5>
                <a href="{{ url('student_categories') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ url('student_categories') }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="mb-2">
                        <label for="max_allow" class="form-label">Max Allow</label>
                        <input type="number" class="form-control" id="max_allow" name="max_allow" value="{{ old('max_allow') }}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @include('partials.notification')

@endsection
