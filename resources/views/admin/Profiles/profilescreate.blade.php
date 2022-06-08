@extends('admin.layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="m-2">
        <form action="{{ route('registration') }}" method="post" class="form-control d-flex flex-column">
            @csrf
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Password confirm">
            <button type="submit" class="btn ">Add user</button>
        </form>
    </div>
@endsection
