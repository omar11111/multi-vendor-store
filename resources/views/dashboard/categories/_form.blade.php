<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Category Name">
    </div>

    <div class="form-group">
        <label>Parent</label>
        <select class="form-control select2bs4" name="parent_id" style="width: 100%;">
            <option value="" selected>Primary Category</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}" @selected($category->parent_id == $parent->id)>{{ $parent->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea type="text" class="form-control" name="description" placeholder="Category Description">{{ $category->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="exampleInputFile">Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="customFile" accept="image/*">
                <label class="custom-file-label" for="customFile">Choose file</label>
                @if ($category->image)
            </div>
        </div>
        <div class="my-2">
            <img src="{{ asset('storage/'.$category->image) }}" class="img-fluid"alt="">                @endif

        </div>

    </div>
    <div class="form-group">

        <label for="exampleInputEmail1" class="d-block">Status</label>
        <input type="checkbox" name="status" @checked($category->status == 'active') data-bootstrap-switch data-off-color="danger"
            data-on-color="success">
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button_lable }}</button>
</div>

@push('scripts')
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
