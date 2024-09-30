@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="card mt-3 fixed-content">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="text-primary"> Student Categories Page</h5>
    <a href="{{ url('student_categories') }}" class="btn btn-primary float-end">Back</a>
    </div>
       <div class="card-body">
       <h6 class="card-title text-primary">Name : <b class="text-dark">{{ $student_category ->name }}</b></h6>
       <h6 class="card-text text-primary">Max Allow: <b class="text-dark">{{$student_category->max_allow }}</b></h6>
      
      </div>
    </div>
    </div>
    </div>

@endsection
