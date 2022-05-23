@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="d-flex flex-column">
        <form class="w-50 align-self-center" action="{{ route('login') }}" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="email">
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>

                <button type="submit" class="w-100 btn btn-primary btn-lg">Login</button>
            </div>
        </form>
    </div>
@endsection
