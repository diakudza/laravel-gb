@extends('admin.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h1 class="h2">Feedbacks</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>
        <table>
        @foreach($feedback as $item)
            <tr>
                <td>{{ $item['id'] }}</td><td>{{ $item['userId'] }}</td><td>{{ $item['title'] }}</td><td>{{ $item['text'] }}</td><td>{{ $item['created_at'] }}</td>
                <td >
                    <div class="d-flex flex-row">
                    <a href="{{ route('feedbacks.show', ['feedback' => $item['id']]) }}" class="btn btn-success">Редактировать</a>
                    <form action="{{route('feedbacks.destroy', ['feedback' => $item['id']])}}" method="post">
                        @csrf
                        @method("DELETE")
                    <button id="delete" class="btn btn-danger">Удалить</button>
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </table>
    </div>
@endsection
