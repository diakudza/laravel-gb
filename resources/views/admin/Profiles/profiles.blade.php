@extends('admin.layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div>
        <div class="p-1 d-flex justify-content-end">
            <a class="btn btn-dark" href="{{route('profiles.create')}}">Manual add user </a>
        </div>
        <div class="mt-2">
            {{ $profiles->links()}}
        </div>
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>phone</th>
                <th>created at</th>
                <th>mod.</th>
            </tr>
            @foreach($profiles as $item)

                <tr>
                    <td>
                        <a href="{{route('profiles.show',['profile' => $item->id])}}">
                            {{ $item->id }}</a>
                    </td>
                    <td>{{ $item->name }} @if($item->role == 1)
                            <i class="bi bi-tools" title="Admin"></i>
                        @elseif($item->role == 2)
                            <i class="bi bi-wrench" title="Moderator"></i>
                        @endif</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="d-flex flex-row">
                            <a href="{{ route('profiles.edit', ['profile' => $item->id]) }}"
                               class="btn btn-success"><i class="bi bi-pen"></i></a>
                            <form action="{{route('profiles.destroy', ['profile' => $item->id])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button id="delete" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>

            @endforeach
        </table>
    </div>
@endsection
