@extends('layouts.app')

@section('title')
    Categories
@endsection

@section('content')
<table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th></th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href='{{ url("/categories/$category->id") }}'>Edit</a>
                    <a href="javascript:void(0)" onclick="document.getElementById('category-delete-{{ $category->id }}').submit()">Delete</a>
                    <form action='{{ url("/categories/$category->id") }}' method="POST" id="category-delete-{{ $category->id }}">
                        @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection