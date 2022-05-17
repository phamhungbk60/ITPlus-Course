@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$role->name) }}"/>
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
