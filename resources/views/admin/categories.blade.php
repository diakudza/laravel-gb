@extends('admin.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h1 class="h2">Categories</h1>

        </div>
        <table>
            @foreach($categories as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['text'] }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>
                        <div class="d-flex flex-row">
                            <a href="{{ route('categories.show', ['category' => $item['id']]) }}"
                               class="btn btn-success">Редактировать</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
