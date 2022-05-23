@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="d-flex flex-column">
        <div class="align-content-center d-flex flex-row justify-content-between">
            <span class="fs-1">Feedback</span>
        @auth
            <button
                class="btn mb-lg-4 btn-success"
                onclick="document.querySelector('#form').classList.toggle('visually-hidden');
                         document.querySelector('#div').classList.toggle('visually-hidden')"
            >CREATE NEW
            </button>
        </div>
        @include('form',['route' => 'feedbackStore'] )
    @endauth
    </div>
    <div id="div" class="pt-2">
    @if(!property_exists('id', $feedbacks))
        @foreach($feedbacks as $feedback)
            <div >
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal"></h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"></h1>
                        {{ $feedback->userId  }} : {{ $feedback->created_at }} : {{ $feedback->text  }}

                    </div>
                </div>

                @endforeach
                @else
                    <p> нет фидбэков</p>
                @endif

            </div>
            </div>
            @endsection
