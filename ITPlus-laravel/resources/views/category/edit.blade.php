@extends('layouts.app')

@section('content')
    <form method="POST" action='{{ url("categories/$category->id") }}'>
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $category->name }}">
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" rows="3">
                    {{ $category->description }}
                </textarea>
            </div>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection