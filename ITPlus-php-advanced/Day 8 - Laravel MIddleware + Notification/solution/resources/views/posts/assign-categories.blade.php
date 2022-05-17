@extends('layouts.main')

@section('content')
    {{-- {{ $postCategories =  }} --}}
    {{-- {{ dd(in_array(4, $postCategories)) }} --}}
    <h2>Assign categories</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ url("posts/{$post->id}/assign-categories") }}" method="POST">
                @csrf
                @foreach ($categories as $category)
                    <div>
                        <input type="checkbox"
                        name="categories[]"
                        value="{{ $category->id }}"
                        id="category-{{ $category->id }}"
                        {{ in_array($category->id, $postCategories) ? 'checked' : '' }}
                        />
                        <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Assign</button>
                <button type="button" onclick="history.go(-1)" class="btn btn-primary">Back</button>
            </form>
        </div>
    </div>
@endsection
