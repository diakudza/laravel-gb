@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')

    <div>
        <div class="align-content-center d-flex flex-row justify-content-between">
            <span class="fs-1">News page</span>
            <div><a href=" {{ route('news.create') }}" class="btn btn-success ">CREATE NEW</a></div>
        </div>
        @if( !property_exists($news, 'id'))
                <br>
            {{ $news->links()  }}
                <br>
{{--            @foreach($news as $new)--}}
{{--                <a href="{{ route('news.show' ,['news' => $new->id]) }}">{{ $new->id }}</a>--}}
{{--            @endforeach--}}

            @foreach($news as $new)
                    @include('components.cart',[$new])
                <br>
            @endforeach
        @elseif ( property_exists($news, 'id') )
            <di>
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Free</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">{{ $news->title }}</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>{{ $news->text }}</li>
                            <li>{{ $news->created_at }}</li>
                        </ul>

                    </div>
                </div>
                @else
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Yet no news</h4>
                    </div>
                @endif




    </div><br>
    {{ $news->links()  }}
    <br>

@endsection
