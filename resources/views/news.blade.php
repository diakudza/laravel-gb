@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')

<div>
    <h1>News page</h1>

    @foreach($news as $new => $val)
        <a href="{{ route('news.show' ,['news' => $new]) }}" >{{ $new }}</a>
    @endforeach

    @if( !$single  )

        @foreach($news as $new=>$val)

            @include('components.cart',['title' => $val['title'], 'text' => $val['text'], 'date' => $val['date'],])


            <br>
        @endforeach
    @endif
    @if( $single  )
        <di>
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Free</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">{{ $single['title'] }}</h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>{{ $single['text'] }}</li>
                    <li>{{ $single['date'] }}</li>
                </ul>

            </div>
        </div>
    @endif
    <a href=" {{ route('news.create') }}" class="btn-success">CREATE NEW</a>
</div>
@endsection
