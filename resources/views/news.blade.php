@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')

    <h1>News</h1>
    @foreach($news as $new)
            <br> Title:{{ $new['title'] }}
            <br> Text: {{ $new['text'] }}
            <br> Date: {{ $new['date'] }}
            <br>
            <br>
    @endforeach

@endsection
