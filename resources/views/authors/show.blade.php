@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-3 fixed-content">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="text-primary"> Author Page</h5>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
            </div>
            <div class="card-body">
                <h6 class="card-title text-primary">Name : <b
                        class="text-dark">{{ $author->first_name }} {{ $author->last_name }}</b></h6>
                <h6 class="card-text text-primary">Description: <b class="text-dark">{{ $author->description }}</b></h6>
            </div>
        </div>
    </div>

@endsection
