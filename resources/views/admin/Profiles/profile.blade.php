@extends('admin.layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="border p-1">
<div class="form-control d-flex flex-row">

    <div class="border ">
        <img src="{{asset("/$profile->avatar")}}" height="300" width="200">
    </div>

    <div class=" d-flex flex-column m-lg-4">
        <div>
            <p>Name: {{$profile->name}}</p>
        </div>
        <div>
            <p>Email: {{$profile->email}}</p>
        </div>
        <div>
            <p>Telephone: {{$profile->phone}}</p>
        </div>
        <div>
           <p>Role: {{$profile->role}}</p>
        </div>
    </div>

</div>
        @if(count($profile->feedbacks))
            <div class="border-top">
                <p> Users feedbacks</p>
                @foreach ($profile->feedbacks as $key => $feedback )
                    <form class="border mt-2 d-flex justify-content-between" action="{{ route('feedbacks.destroy',['feedback'=> $feedback->id])}}" method="post" >
                        @csrf
                        @method("DELETE")
                        <div>{{$key+1}} : {{ $feedback->text }}</div> <button class="btn-close"></button>
                    </form>
                @endforeach
            </div>

        @endif

    <a href="{{route('profiles.index')}}" class="btn btn-outline-danger">Close profile</a>
</div>
@endsection
