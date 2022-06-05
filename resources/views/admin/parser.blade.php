@extends('admin.layouts.base')

@section('content')
    <div>
        @foreach($xml as $item)
            <div class="border-2">
                <h4>{{ $item->title }}</h4>
                <p>{{ $item->description }}</p>
                <a href="{{ $item->link }}">ссылка</a>
                <hr>
            </div>

        @endforeach
    </div>
@endsection
