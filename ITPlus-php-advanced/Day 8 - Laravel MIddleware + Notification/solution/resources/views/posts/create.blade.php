@extends('layouts.main')

@section('title')
    Create post
@endsection

@section('content')
    <h2>Create new post</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ url("posts") }}" method="POST">
                @include('posts._form')
                <button type="submit" class="btn btn-primary">{{ __('common.buttons.create') }}</button>
                <button type="button" class="btn btn-secondary" onclick="history.go(-1)">{{ __('common.buttons.back') }}</button>
            </form>
        </div>
    </div>
@endsection
