@extends('admin.layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="m-2">
        <form action="{{ route('profiles.update', ['profile' => $profile->id]) }}" method="post" class="form-control d-flex flex-column gap-2" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
            <input type="text" class="form-control" name="email" value="{{ $profile->email }}">
            <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}">
            <input type="text" class="form-control" name="created_at" value="{{ $profile->created_at }}">
            <input type="file" class="form-control" name="avatar" value="{{ $profile->avatar }}">
            <select name="role">
                <option value="0" @if($profile->role == 0) selected @endif>User</option>
                <option value="1" @if($profile->role == 1) selected @endif>Admin</option>
                <option value="2" @if($profile->role == 2) selected @endif>Moderator</option>
            </select>
            <button type="submit" class="btn ">Save</button>
        </form>
    </div>
@endsection
