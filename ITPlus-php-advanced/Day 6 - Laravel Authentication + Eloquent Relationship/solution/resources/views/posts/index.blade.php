@extends('layouts.main')

@push('css')
<style>
    .item-operations
    {
        display: flex;
        list-style-type: none;
    }
</style>
@endpush

@section('content')
    <h1>Posts</h1>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
            {{ __('common.buttons.create') }}
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ url('posts') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Create new post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title"/>

                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea type="text" class="form-control" name="content"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Form list posts --}}
    @foreach ($posts as $post)
        <div class="card mt-3">
            <div class="card-body">
                <div class="title d-flex justify-content-between align-items-center">
                    <div class="left">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <span class="text-muted">Category: {{ $post->categories->pluck('name')->implode(',') }}</span>
                    </div>
                    <ul class="item-operations">
                        <li class="mr-2"><a class="text-info" href="{{ url("posts/{$post->id}/assign-categories") }}">Assign categories</a></li>
                        <li class="mr-2"><a href="{{ url("posts/{$post->id}/edit") }}">Edit</a></li>
                        <li><a href="javascript:void(0)" class="text-danger" onclick="deleteItem(this)" data-id="{{ $post->id }}">Delete</a></li>
                    </ul>

                </div>
                <hr/>
                <p>{{ $post->content }}</p>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
    <script>
        function deleteItem(e) {
            const confirmDeletePost = confirm('Bạn có chắc chắn muốn xoá post này')
            if (confirmDeletePost) {
                //Lấy thuộc tính data-id của element đang được ấn
                axios.delete(`posts/${e.getAttribute('data-id')}`)
                //nếu thành công thì tiến hành reload lại trang
                .then(res => location.reload())
                .catch(err => console.err(err))
            }
        }
    </script>
@endpush
