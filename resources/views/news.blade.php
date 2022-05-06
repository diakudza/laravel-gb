@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')


    <h1>News page</h1>

    @foreach($news as $new => $val)
        <a href="{{ route('news.show' ,['news' => $new]) }}" >{{ $new }}</a>
    @endforeach

    @if( !$single  )

        @foreach($news as $new=>$val)

            <br> Title:{{ $val['title'] }}
            <br> Text: {{ $val['text'] }}
            <br> Date: {{ $val['date'] }}
            <form action="{{ route('news.destroy', ['news' => $new]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"> DELETE</button>
            </form>
            <br>
        @endforeach
    @endif
    @if( $single  )
        <p> title : {{ $single['title'] }}</p>
        <p> text : {{ $single['text'] }}</p>
        <p> date : {{ $single['date'] }}</p>
    @endif
    <a href=" {{ route('news.create') }}">CREATE NEW</a>

@endsection

