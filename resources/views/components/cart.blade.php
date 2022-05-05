<div class="card shadow-sm">
    <div class="card-body">
        <p class="card-text">{{ $new->text }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <form action="{{ route('news.destroy', ['news' => $new->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">DELETE</button>
                </form>
            </div>
            <small class="text-muted">{{ $new->created_at}}</small>
        </div>
    </div>
</div>
