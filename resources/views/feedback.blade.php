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
        <form id="form" class="align-self-center w-50 mt-2 visually-hidden" action="{{ route('news.store') }}" method="post">

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
        @endauth
    </div>
    <div id="div">
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
