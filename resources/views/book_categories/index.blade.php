@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3 fixed-content">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Book Category List</h5>
            <a href="{{ route('book_categories.create') }}" class="btn btn-primary">Add Book Category</a>
        </div>
        <div class="card-body">
           <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $bookcategory)
                            <tr>
                                <td>{{ $bookcategory->id }}</td>
                                <td>{{ $bookcategory->name }}</td>
                                <td>
                                    <a href="{{ route('book_categories.show',  $bookcategory) }}" class="btn btn-info btn-sm" title="View Book Category">View</a>
                                    <a href="{{ route('book_categories.edit', $bookcategory) }}" class="btn btn-primary btn-sm" title="Edit Book Category">Edit</a>
                                    <form method="POST" action="{{ route('book_categories.destroy',  $bookcategory) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#confirmDeleteModal"
                                                data-id="{{$bookcategory->id}}" 
                                                data-type="book category"
                                                data-url="{{ route('book_categories.destroy',$bookcategory) }}"
                                                title="Delete Student">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination links -->
            <div class="d-flex justify-content-center">
              {{ $categories->appends(['per_page' => request('per_page')])->links('vendor.pagination.bootstrap-5') }}
          </div>
        </div>
    </div>
</div>
@include('partials.notification')
@endsection

