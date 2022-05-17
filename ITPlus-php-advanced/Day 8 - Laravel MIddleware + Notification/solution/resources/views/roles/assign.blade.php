@extends('layouts.main')

@section('content')
    <h2>Assign roles {{ $role->name }}</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{ url("roles/{$role->id}/assign-to-people") }}" method="POST">
                    @method('PUT')
                    @csrf
                    @foreach ($users as $user)
                        <div>
                            <input type="checkbox"
                            name="users[]"
                            value="{{ $user->id }}"
                            id="user-{{ $user->id }}"
                            {{ in_array($user->id, $usersBelongsToRole) ? 'checked' : '' }}
                            />
                            <label for="user-{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Assign</button>
                    <button type="button" onclick="history.go(-1)" class="btn btn-primary">Back</button>
                </form>
            </div>
        </div>
@endsection
