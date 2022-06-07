@extends('admin.layouts.base')

@section('content')
    <div class="m-2">
        <form action="{{ route('categories.store') }}" method="post" class="form-control d-flex flex-column">
            @csrf
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="title">
            <button type="submit" class="btn ">Add</button>
        </form>
    </div>
@endsection
