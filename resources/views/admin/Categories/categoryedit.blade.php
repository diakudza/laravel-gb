@extends('admin.layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="m-2">
        <form action="{{ route('categories.update', ['category' => $categories->id]) }}" method="post" class="form-control d-flex flex-column">
            @csrf
            @method("PUT")
            <input type="text" class="form-control" name="title" value="{{ $categories->title }}">
            <button type="submit" class="btn ">Submit</button>
        </form>
    </div>
@endsection
