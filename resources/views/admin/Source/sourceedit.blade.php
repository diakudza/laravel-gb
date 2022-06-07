@extends('admin.layouts.base')

@section('content')
    <div class="m-2">
        <form action="{{ route('sources.update', ['source' => $source->id]) }}" method="post" class="form-control d-flex flex-column gap-2" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="text" class="form-control" name="title" value="{{ $source->title }}" placeholder="title">
            <input type="text" class="form-control" name="text" value="{{ $source->text }}" placeholder="text">
            <input type="text" class="form-control" name="url" value="{{ $source->url }}" placeholder="url">
            <select class="form-control" name="category_id" >
            @foreach($categories as $category)
                    <option @if ($category->id == $source->category->id) selected @endif value="{{$category->id}}"> {{$category->title}} </option>
                @endforeach
            </select>
            <div><input type="checkbox" name="active" value="1" @if ($source->active) checked @endif>active</div>
            <button type="submit" class="btn ">Update</button>
        </form>
    </div>
@endsection
