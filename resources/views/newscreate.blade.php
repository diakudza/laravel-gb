@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')


    <h1>News create</h1>
    <form action="{{ route('news.store') }}" method="post">
        @csrf
        <input type="text" name="newstitle" placeholder="title">
        <input type="text" name="text" placeholder="text">
        <button type="submit"> CREATE</button>
    </form>

@endsection
