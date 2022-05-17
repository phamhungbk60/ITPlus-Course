@extends('layouts.main')

@section('content')
    <h2>View post</h2>
    <div class="card mt-3">
        <div class="card-body">
            <div class="title d-flex justify-content-between align-items-center">
                <div class="left">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <span class="text-muted">Category: {{ $post->categories->pluck('name')->implode(',') }}</span>
                </div>
            </div>
            <hr/>
            <p>{!! $post->content !!}</p>
        </div>
    </div>
@endsection
