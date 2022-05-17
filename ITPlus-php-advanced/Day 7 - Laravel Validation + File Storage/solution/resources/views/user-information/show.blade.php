@extends('layouts.main')

@section('content')
    <h2 class="mb-3">Update user profile</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('user-profile') }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address">{{ $userInformation->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" class="form-control" id="phone" name="phone_number" value="{{ $userInformation->phone_number }}"/>
                </div>
                <div class="form-group">
                    <label for="address">Date of birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="{{ $userInformation->dob }}"/>
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    {{-- Nếu avatar_name không trắng thì hiển thị file đó lên --}}
                    @if (!empty($userInformation->avatar_name))
                        <img src="{{ asset('storage'.DIRECTORY_SEPARATOR.$userInformation->avatar_path.
                        DIRECTORY_SEPARATOR.$userInformation->avatar_name) }}" />
                    @endif
                    <input type="file" class="form-control" id="avatar" name="avatar"/>
                </div>
                <button type="submit" class="btn btn-primary">Update profile</button>
            </form>
        </div>
    </div>
@endsection
