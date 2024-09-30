@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-3 fixed-content">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Authors List</h5>
                <a href="{{ route('authors.create') }}" class="btn btn-primary">Add New Author</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->first_name }}</td>
                                <td>{{ $author->last_name }}</td>
                                <td>{{ $author->description }}</td>
                                <td>
                                    <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info btn-sm"
                                       title="View Author">View</a>
                                    <a href="{{ route('authors.edit',$author->id) }}" class="btn btn-primary btn-sm"
                                       title="Edit Author">Edit</a>
                                    <form method="POST" action="{{ route('students.destroy', $author->id) }}"
                                          accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal"
                                                data-id="{{ $author->id }}"
                                                data-type="author"
                                                data-url="{{ route('authors.destroy', $author->id) }}"
                                                title="Delete Student">Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination links -->
                <div class="d-flex justify-content-center">
                    {{ $authors->appends(['per_page' => request('per_page')])->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    @include('partials.notification')
@endsection

