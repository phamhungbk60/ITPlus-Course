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
    {{-- Form create new --}}
    <div class="card">
        <div class="card-body">
            <form action="{{ url('categories') }}" method="POST">
                @include('categories._form')
                <button type="submit" class="btn btn-primary">{{ __('common.buttons.create') }}</button>
            </form>
        </div>
    </div>
    {{-- Form list categories --}}
    @foreach ($categories as $category)
        <div class="card mt-3">
            <div class="card-body">
                <div class="title d-flex justify-content-between align-items-center">
                    <h4 class="card-title">{{ $category->name }}</h4>
                    <ul class="item-operations">
                        <li class="mr-2"><a href="{{ url("categories/{$category->id}/edit") }}">Edit</a></li>
                        <li><a href="javascript:void(0)" class="text-danger" onclick="deleteItem()" data-id="{{ $category->id }}">Delete</a></li>
                    </ul>
                </div>
                <hr/>
                <p>{{ $category->description }}</p>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
    <script>
        function deleteItem() {
            axios.delete("categories/{{ $category->id }}")
            .then(res => location.reload())
            .catch(err => console.err(err))
        }
    </script>
@endpush
