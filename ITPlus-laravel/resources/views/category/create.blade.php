@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ url('categories') }}">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" rows="3"></textarea>
            </div>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection