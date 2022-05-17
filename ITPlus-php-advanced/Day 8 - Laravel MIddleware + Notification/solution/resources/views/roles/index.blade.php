@extends('layouts.main')

@section('title')
    Roles
@endsection

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
    {{-- Form create new --}}
    <h1>Roles</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('roles') }}" method="POST">
                @include('roles._form')
                <button type="submit" class="btn btn-primary">{{ __('common.buttons.create') }}</button>
            </form>
        </div>
    </div>
    {{-- Form list categories --}}
    @foreach ($roles as $role)
        <div class="card mt-3">
            <div class="card-body">
                <div class="title d-flex justify-content-between align-items-center">
                    <h4 class="card-title">{{ $role->name }}</h4>
                    <ul class="item-operations">
                        <li class="mr-2"><a class="text-info" href="{{ url("roles/{$role->id}/assign-to-people") }}">Assign to people</a></li>
                        <li class="mr-2"><a href="{{ url("roles/{$role->id}/edit") }}">Edit</a></li>
                        <li><a href="javascript:void(0)" class="text-danger" onclick="deleteItem(this)" data-id="{{ $role->id }}">Delete</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
    <script>
        function deleteItem(e) {
            const confirmDeletePost = confirm('Bạn có chắc chắn muốn xoá role này')
            if (confirmDeletePost) {
                axios.delete(`roles/${e.getAttribute('data-id')}`)
                .then(res => location.reload())
                .catch(err => console.err(err))
            }
        }
    </script>
@endpush
