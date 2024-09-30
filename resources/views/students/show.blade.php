<!-- resources/views/students/show.blade.php -->
@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="card mt-3 fixed-content">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="text-primary"> Students Page</h5>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </div>
       <div class="card-body">
   
       <h6 class="card-title text-primary">Name : <b class="text-dark">{{ $student->first_name }} {{ $student->last_name }}</b></h6>
       
       <h6 class="card-text text-primary">Email : <b class="text-dark">{{ $student->email }}</b></h6>
       <h6 class="card-text text-primary">Year: <b class="text-dark">{{ $student->year }}</b></h6>
       <h6 class="card-text text-primary">Approved : <b class="text-dark">{{ $student->student ? 'Yes' : 'No' }}</b></h6>
       <h6 class="card-text text-primary">Category : <b class="text-dark">{{ $student->studentCategory->name ?? 'N/A' }}</b></h6>
       <h6 class="card-text text-primary">Branch : <b class="text-dark">{{ $student->branch->name ?? 'N/A' }}</b></h6>
       <h6 class="card-text text-primary">Books:
        <b class="text-dark"><ul>
                    @foreach($student->books as $book)
                        <li>{{ $book->title }}</li>
                    @endforeach
        </b></ul>
       </h6>
      
      
      </div>
    </div>
    </div>
    </div>

@endsection
