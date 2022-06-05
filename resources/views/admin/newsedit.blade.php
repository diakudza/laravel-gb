@extends('admin.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="m-2">
        <form action="{{ route('news.update', ['news' => $new['id']]) }}" method="post" class="form-control d-flex flex-column">
            @csrf
            @method("PUT")
            <input type="text" class="form-control" name="title" value="{{ $new['title'] }}">
            <input type="text" class="form-control" name="text" value="{{ $new['text'] }}">
            <button type="submit" class="btn ">Submit</button>
        </form>
    </div>
@endsection
