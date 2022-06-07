@extends('admin.layouts.base')

@section('content')
    <div>
      <div class="p-1 d-flex justify-content-between">
          <a class="btn btn-dark" href="{{route('parser')}}">Parse to DB</a>
          <a class="btn btn-dark" href="{{route('sources.create')}}">ADD NEW</a>
      </div>
        <table class="table table-hover">
            <tr><th>id</th><th>category</th><th>text</th><th>url</th><th>mod.</th></tr>
        @foreach($sources as $item)
            <tr @if ($item->active === 0) style="background:darkgray;" @endif>
                <td>{{ $item->id }}</td>
                <td>{{ $item->category->title }}</td>
                <td>{{ $item->text }}</td>
                <td>{{ $item->url }}</td>
                <td >
                    <div class="d-flex flex-row">
                    <a href="{{ route('sources.edit', ['source' => $item->id]) }}" class="btn btn-success"><i class="bi bi-pen"></i></a>
                    <form action="{{route('sources.destroy', ['source' => $item->id])}}" method="post">
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
