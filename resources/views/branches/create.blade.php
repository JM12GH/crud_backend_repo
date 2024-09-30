@extends('layouts.app')

@section('content')

<div class="container">
        <div class="card  mt-3 fixed-content">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Add Branch</h5>
                <a href="{{ route('branches.index') }}" class="btn btn-secondary">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('branches.store') }}" method="POST">

                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @include('partials.notification')
@endsection
