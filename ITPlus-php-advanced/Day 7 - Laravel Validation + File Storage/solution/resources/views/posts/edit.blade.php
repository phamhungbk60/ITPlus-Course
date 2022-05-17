@extends('layouts.main')

@section('content')
    <h2>Edit post</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ url("posts/{$post->id}") }}" method="POST">
                @method('PUT')
                @include('posts._form')
                <button type="submit" class="btn btn-primary">{{ __('common.buttons.update') }}</button>
                <button type="button" class="btn btn-secondary" onclick="history.go(-1)">{{ __('common.buttons.back') }}</button>
            </form>
        </div>
    </div>
@endsection
