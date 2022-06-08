@php
    $inputTitle = $inputTitle ?? false;
@endphp

<form
    id="form"
    class="align-self-center w-50 mt-2 visually-hidden"
    action="{{ route($route) }}"
    method="post"
>
    @csrf
    <div class="row g-3">
        @if($inputTitle)
        <div class="col-12">
            <label for="email" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="newstitle" placeholder="title">
        </div>
        @endif
        <div class="col-12">
            <label for="text" class="form-label">Text</label>
            <input type="text" class="form-control" id="text" name="text" placeholder="text">
        </div>
        <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
        <button type="submit" class="w-100 btn btn-primary btn-lg"> CREATE</button>
    </div>
</form>
