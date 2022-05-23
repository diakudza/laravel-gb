

<div class="card mb-4 rounded-3 shadow-sm">
    <div class="card-header py-3 d-flex justify-content-sm-between">
        <h3 class="my-0 fw-normal">{{ $new->title }}</h3>
        <p>{{ $new->created_at }}</p>
    </div>
    <div class="card-body">
        <p class="card-title pricing-card-title">{{ $new->text }}</p>

        @auth()
            <form action="{{ route('news.destroy', ['news' => $new->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-secondary">DELETE</button>
            </form>
        @endauth
    </div>

</div>
