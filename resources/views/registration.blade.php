@extends('layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="d-flex flex-column">
        <form class="w-50 align-self-center" action="{{ route('registration') }}" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name">
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div class="col-12">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password confirm</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
                </div>
                <p>Already have account? <a href="{{ route('login') }}">SingIn</a></p>
                <button type="submit" class="w-100 btn btn-primary btn-lg">SingUp</button>
            </div>
        </form>
    </div>
@endsection
