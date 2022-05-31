@extends('admin.layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="m-2">
        <form action="{{ route('feedbacks.update', ['feedback' => $feedback['id']]) }}" method="post" class="form-control d-flex flex-column">
            @csrf
            @method("PUT")
            <input type="text" class="form-control" name="userId" value="{{ $feedback['user_id'] }}" placeholder="user_id">
            <input type="text" class="form-control" name="text" value="{{ $feedback['text'] }}" laceholder="text">
            <input type="checkbox"  name="like" value="1" @if ($feedback['like']) checked @endif >
            <button type="submit" class="btn ">Submit</button>
        </form>
    </div>
@endsection
