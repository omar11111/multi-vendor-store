<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) name="name" value="{{ old('name', $category->name) }}"
            placeholder="Category Name">
        @error('name')
            <div @class(['invalid-feedback'])>
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Parent</label>
        <select @class(['form-control', 'is-invalid' => $errors->has('parent_id')]) name="parent_id" style="width: 100%;">
            <option value="" selected>Primary Category</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}" @selected(old('name', $category->parent_id) == $parent->id)>{{ $parent->name }}</option>
            @endforeach

        </select>
        @error('parent_id')
            <div @class(['invalid-feedback'])>
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea type="text" @class(['form-control', 'is-invalid' => $errors->has('description')]) name="description" placeholder="Category Description">{{ old('description', $category->description) }}</textarea>
        @error('description')
            <div @class(['invalid-feedback'])>
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputFile">Image</label>
        <div class="input-group">
            <div @class(['custom-file', 'is-invalid' => $errors->has('image')])>
                <input type="file" @class(['custom-file-input']) name="image" id="customFile" accept="image/*">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            @error('image')
                <div @class(['invalid-feedback'])>
                    {{ $message }}
                </div>
            @enderror
        </div>
        @if ($category->image)
            <div class="my-2">
                <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid"alt="">
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Status</label>

        <div @class(['is-invalid' => $errors->has('status')])>
            <input type="checkbox" name="status" @checked(old('status', $category->status) == 'active' || old('status', $category->status) == 'on') data-bootstrap-switch
                data-off-color="danger" data-on-color="success">
        </div>

        @error('status')
            <div @class(['invalid-feedback'])>
                {{ $message }}
            </div>
        @enderror
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
