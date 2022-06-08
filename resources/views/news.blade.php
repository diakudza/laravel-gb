@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="d-flex flex-column">
        <div class="align-content-center d-flex flex-row justify-content-between">
            <span class="fs-1">News page</span>

            @auth

                <button
                    class="btn mb-lg-4 btn-success"
                    onclick="document.querySelector('#form').classList.toggle('visually-hidden');
                         document.querySelector('#div').classList.toggle('visually-hidden')"
                >CREATE NEW
                </button>
        </div>

        @include('form',['inputTitle' => true, 'route' => 'news.store'] )
        @endauth
    </div>
    @if( !property_exists($news, 'id'))
        <div class="mt-2">
            {{ $news->links()}}
        </div>

        @foreach($news as $new)
            @include('components.cart',[$new])
            <br>
        @endforeach
    @elseif ( property_exists($news, 'id') )
        <div>
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
