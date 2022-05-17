@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$category->name) }}"/>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" name="description" id="description" class="form-control">
        {{ old('description', $category->description) }}
    </textarea>
</div>
