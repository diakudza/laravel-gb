@extends('admin.layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
        </div>
        <div class="p-1 d-flex justify-content-end">
            <a class="btn btn-dark" href="{{route('categories.create')}}">ADD NEW</a>
        </div>
        <div class="mt-2">
            {{ $categories->links()}}
        </div>
        <table>
            @foreach($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->text }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="d-flex flex-row">
                            <a href="{{ route('categories.show', ['category' => $item->id]) }}" class="btn btn-success"><i class="bi bi-pen"></i></a>
                            <form action="{{route('categories.destroy', ['category' => $item->id])}}" method="post">
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
