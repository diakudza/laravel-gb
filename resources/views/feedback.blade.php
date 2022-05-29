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
                        "
                >CREATE NEW
                </button>
        </div>
        @include('form',['route' => 'feedbackStore'] )
        @endauth
    </div>
    {{ $feedbacks->links()}}
    <div id="div" class="pt-2">

            @foreach($feedbacks as $feedback)
                <div>
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">{{ $feedback->user->name }}</h4>
                        </div>
                        <div class="card-body d-flex ">
                            <div>{{ $feedback->created_at }} :</div>
                            <div> {{ $feedback->text  }}</div>
                        </div>
                    </div>
                </div>
                    @endforeach



    </div>

@endsection

