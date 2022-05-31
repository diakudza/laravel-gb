@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')

<div>
    <h1>Main</h1>
        <h4>Random news from our base:</h4> <h2>{{ $randNews->title }}</h2>
        <p>{{ $randNews->text }}</p>
        <p>{{ $randNews->created_at }}</p>

    <div class="d-flex flex-column align-items-end">
        <h3>Last feedbacks</h3>
        @foreach($lastFeedbacks as $feedback)
            <p>{{ $feedback->user->name}}  say: {{ $feedback->text }}</p>
        @endforeach
    </div>
</div>
@endsection
