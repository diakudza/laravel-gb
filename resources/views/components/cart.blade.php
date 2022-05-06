<div class="card shadow-sm">
   <div class="card-body">
        <p class="card-text">{{ $text }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group"><form action="{{ route('news.destroy', ['news' => $new]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">DELETE</button>
                </form>
            </div>
            <small class="text-muted">{{ $date }}</small>
        </div>
    </div>
</div>
