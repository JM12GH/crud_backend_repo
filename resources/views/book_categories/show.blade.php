
@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="card mt-3 fixed-content">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="text-primary"> Book Category Page</h5>
    <a href="{{ route('book_categories.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
       <h6 class="card-title text-primary">Name : <b class="text-dark">{{ $bookCategory->name }}</b></h6>
    </div>
    </div>
    </div>
    

@endsection
