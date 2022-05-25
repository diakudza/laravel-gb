@extends('admin.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="m-2">
        <form action="{{ route('feedbacks.update', ['feedback' => $feedback['id']]) }}" method="post" class="form-control d-flex flex-column">
            @csrf
            @method("PUT")
            <input type="text" class="form-control" name="userId" value="{{ $feedback['userId'] }}">
            <input type="text" class="form-control" name="text" value="{{ $feedback['text'] }}">
            <input type="checkbox"  name="like" value="like" @if ($feedback['like']) checked @endif >
            <button type="submit" class="btn ">Submit</button>
        </form>
    </div>
@endsection
