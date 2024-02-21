@extends('layouts.dashboard')

@section('title', 'Create Category')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('categories.store') }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Category Name">
                        </div>

                        <div class="form-group">
                            <label>Parent</label>
                            <select class="form-control select2bs4" name="parent_id" style="width: 100%;">
                                <option value="" selected>Primary Category</option>
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea type="text" class="form-control" name="description" placeholder="Category Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="d-block">Status</label>
                            <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger"
                                data-on-color="success">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
{{-- here --}}
@push('scripts')
    {{-- switcher bootstrap --}}
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $(function() {
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
        })
    </script>
@endpush
