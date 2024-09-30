@extends('layouts.app')

@section('content')

<div class="container">
            <div class="card mt-3 fixed-content">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Student Category List</h5>
                    <a href="{{ route('student_categories.create') }}" class="btn btn-primary">Add Student Category</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Max Allow</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($student_categories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->max_allow }}</td>
                                        <td>
                                            <a href="{{ route('student_categories.show', $item->id) }}" title="View Student"><button class="btn btn-info btn-sm">View</button></a>
                                            <a href="{{ route('student_categories.edit', $item->id) }}"  title="Edit Student"><button class="btn btn-primary btn-sm">Edit</button></a>
                                            <form method="POST" action="{{ route('student_categories.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="button" class="btn btn-danger btn-sm delete-btn" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#confirmDeleteModal"
                                                        data-id="{{ $item->id }}" 
                                                        data-type="student-category"
                                                        data-url="{{ route('student_categories.destroy', $item->id) }}"
                                                        title="Delete Student Category">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination links -->
                    <div class="d-flex justify-content-center">
                        {{ $student_categories->appends(['per_page' => request('per_page')])->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div> 
    
@include('partials.notification')
@endsection
