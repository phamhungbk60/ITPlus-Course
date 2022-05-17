@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$category->name) }}"/>
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" name="description" id="description" class="form-control">
        {{ old('description', $category->description) }}
    </textarea>
    @error('description')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
