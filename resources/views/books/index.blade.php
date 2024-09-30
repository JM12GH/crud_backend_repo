@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3 fixed-content">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Book List</h5>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('books.index') }}" class="mb-2 bg-secondary text-white p-3 rounded">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <span>Filter by</span>
                    </div>
                    <div class="col-auto">
                        <div id="filterOptions" class="collapse {{ request()->hasAny('book_category_id') ? 'show' : '' }}">
                            <div class="row">
                                <div class="col">
                                    <select name="book_category_id" id="book_category_id" class="form-select" onchange="this.form.submit()">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : ''}}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col ms-auto text-end">
                        <a href="#" id="toggle-filters" class="text-white" data-bs-toggle="collapse" data-bs-target="#filterOptions">
                            {{ request()->hasAny('student_category_id') ? '- Hide filters' : '+ Show filters' }}
                        </a>
                    </div>
                </div>
            </form>
           
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Shelf_No</th>
                            <th>Photo</th>
                            <th>No_Copies</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->shelf_number }}</td>
                                <td>
                                    @if($book->preview_photo)
                                    <img src="{{ asset('storage/' . $book->preview_photo) }}" alt="{{ $book->title }}" width="50">
                                     @else
                                    N/A
                                    @endif
                                </td>
                                <td>{{ $book->total_nr_of_copies }}</td>
                                <td>{{ $book->bookCategory->name ?? 'N/A' }}</td>
                                <td>
                                    @if($book->authors->isEmpty())
                                    N/A
                                @else
                                    @php
                                        $authorNames = $book->authors->map(function($author) {
                                            return $author->first_name . ' ' . $author->last_name;
                                        })->implode(', ');
                                    @endphp
                                    {{ $authorNames }}
                                @endif
                               </td>
                                <td>
                                
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm" title="View Book">View</a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm" title="Edit Book">Edit</a>
                                    <form method="POST" action="{{ route('books.destroy', $book->id) }}" accept-charset="UTF-8" style="display:inline">
                                      {{ method_field('DELETE') }}
                                      {{ csrf_field() }}
                                      <button type="button" class="btn btn-danger btn-sm delete-btn" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#confirmDeleteModal"
                                                data-id="{{ $book->id }}" 
                                                data-type="book"
                                                data-url="{{ route('books.destroy', $book->id) }}"
                                                title="Delete Book">Delete</button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $books->appends(['book_id' => request('book_id'), 'book_category_id' => request('book_category_id') ])->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@include('partials.notification')
@endsection
