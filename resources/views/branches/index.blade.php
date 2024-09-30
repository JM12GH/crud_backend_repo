@extends('layouts.app')
@section('content')
   
<div class="container">
    <div class="card mt-3 fixed-content">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Branches</h5>
            <a href="{{ route('branches.create') }}" class="btn btn-primary">Add Branch</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('branches.show', $item->id) }}" class="btn btn-info btn-sm" title="View Branch">View</a>
                                    <a href="{{ route('branches.edit', $item->id) }}" class="btn btn-primary btn-sm" title="Edit Branch">Edit</a>
                                    <form method="POST" action="{{ route('branches.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                      {{ method_field('DELETE') }}
                                      {{ csrf_field() }}
                                      <button type="button" class="btn btn-danger btn-sm delete-btn" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#confirmDeleteModal"
                                              data-id="{{ $item->id }}" 
                                              data-type="branch"
                                              data-url="{{ route('branches.destroy', $item->id) }}"
                                              title="Delete Branch">Delete</button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination links -->
            <div class="d-flex justify-content-center">
                {{ $branches->appends(['per_page' => request('per_page')])->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@include('partials.notification')
@endsection
