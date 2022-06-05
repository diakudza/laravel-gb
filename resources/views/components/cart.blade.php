

<div class="card mb-4 rounded-3 shadow-sm">
    <div class="card-header py-3 d-flex justify-content-sm-between">
        <div>
            <h3 class="my-0 fw-normal mb-3">{{ $new->title }}</h3>
            <p>Cat.: {{$new->category->title }}</p>
        </div>
        <p>{{ $new->created_at }}</p>
    </div>
    <div class="card-body">
        <p class="card-title pricing-card-title">{{ $new->text }}</p>
    @if(auth()->user())
        @if( auth()->user()->role === 1)
            <form action="{{ route('news.destroy', ['news' => $new->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-secondary">DELETE</button>
            </form>
        @endif
    @endif
    </div>

</div>
