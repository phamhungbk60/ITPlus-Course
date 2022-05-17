@csrf
<div class="form-group">
    <label for="name">Title</label>
    <input type="text" name="title" id="name" class="form-control" value="{{ old('title', $post->title) }}"/>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea type="text" name="content" id="content" class="form-control">
        {{ old('content', $post->content) }}
    </textarea>
</div>
