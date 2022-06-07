@extends('admin.layouts.base')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div>
      <div class="p-1 d-flex justify-content-end">
          <a class="btn btn-dark" href="{{route('new.create')}}">ADD NEW</a>
      </div>
        <div class="mt-2">
            {{ $news->links()}}
        </div>
        <table class="table table-hover">
            <tr><th>id</th><th>title</th><th>text</th><th>category</th><th>created at</th><th>mod.</th></tr>
        @foreach($news as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->text }}</td>
                <td>{{ $item->category->title }}</td>
                <td>{{ $item->created_at }}</td>
                <td >
                    <div class="d-flex flex-row">
                    <a href="{{ route('new.show', ['news' => $item->id]) }}" class="btn btn-success"><i class="bi bi-pen"></i></a>
                    <form action="{{route('new.destroy', ['news' => $item->id])}}" method="post">
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
