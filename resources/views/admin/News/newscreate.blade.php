@extends('admin.layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="m-2">
        <form action="{{ route('new.store') }}" method="post" class="form-control d-flex flex-column">
            @csrf
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            <input type="text" class="form-control" name="text" value="{{ old('text') }}">
            <select class="form-control" name="category" >
                @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->title}} </option>
                @endforeach
            </select>
            <button type="submit" class="btn ">Submit</button>
        </form>
    </div>
@endsection
