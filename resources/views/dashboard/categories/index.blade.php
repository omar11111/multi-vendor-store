@extends('layouts.dashboard')
@section('title', 'Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-5">
        <a href="{{ route('categories.create') }}" class="btn btn-outline-success ">Create</a>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                {{-- <div class="card-header">
                        <h3 class="card-title">Categories Data</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td></td>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent_id }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-block btn-outline-info btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category->id) }}">
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-block btn-outline-danger btn-sm">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty

                                <tr colspan ="7">
                                    <td> No Categories Defined </td>
                                </tr>
                            @endforelse



                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection


