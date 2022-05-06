@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')


    <h1>News create</h1>
    <form action="{{ route('news.store') }}" method="post">

        @csrf
        <div class="row g-3">
        <div class="col-12">
            <label for="email" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="newstitle" placeholder="title">
        </div>
        <div class="col-12">
            <label for="text" class="form-label">Text</label>
            <input type="text" class="form-control" id="text" name="text" placeholder="text">
        </div>

        <button type="submit" class="w-100 btn btn-primary btn-lg"> CREATE</button>
        </div>
    </form>

@endsection
