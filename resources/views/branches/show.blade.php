<!-- resources/views/students/show.blade.php -->
@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="card mt-3 fixed-content">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="text-primary"> Branch Page</h5>
    <a href="{{ url('students') }}" class="btn btn-primary float-end">Back</a>
    </div>
       <div class="card-body">
       <h6 class="card-title text-primary">The branch name with id {{ $branch->id }}  is : <b class="text-dark">{{ $branch->name }}</b></h6>
    </div>
    </div>
    </div>
    

@endsection
