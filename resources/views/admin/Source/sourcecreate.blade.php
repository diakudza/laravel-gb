@extends('admin.layouts.base')

@section('content')
    <div class="m-2">
        <form action="{{ route('sources.store') }}" method="post" class="form-control d-flex flex-column">
            @csrf
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="title">
            <input type="text" class="form-control" name="text" value="{{ old('text') }}" placeholder="text">
            <input type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="url">
            <input type="checkbox" name="active" value="1" @if (old('active')) checked @endif >
            <button type="submit" class="btn ">Add</button>
        </form>
    </div>
@endsection
