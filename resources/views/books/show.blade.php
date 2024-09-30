
@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="card mt-3 fixed-content">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="text-primary"> Books Page</h5>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </div>
       <div class="card-body">
   
       <h6 class="card-title text-primary">Title : <b class="text-dark">{{ $book->title }}</b></h6>
       <h6 class="card-text text-primary">Description: <b class="text-dark">{{ $book->description }}</b></h6>
       <h6 class="card-text text-primary">Shelf_No : <b class="text-dark">{{ $book->shelf_number ? 'Yes' : 'No' }}</b></h6>
       <h6 class="card-text text-primary">Photo : <b class="text-dark">{{ $book->preview_photo }}</b></h6>
       <h6 class="card-text text-primary">No_Copies:<b class="text-dark">{{ $book->total_nr_of_copies ?? 'N/A' }}</b></h6>
       <h6 class="card-text text-primary">Category:<b class="text-dark">{{ $book->bookCategory->name ?? 'N/A' }}</b></h6>
       <h6 class="card-text text-primary">Authors:
        <b class="text-dark"><ul>
                    @foreach($book->authors as $author)
                        <li> {{ $author->first_name }} {{ $author->last_name }}</li>
                    @endforeach
        </b></ul>
       </h6>
      
      
      </div>
    </div>
    </div>
</div>

@endsection
