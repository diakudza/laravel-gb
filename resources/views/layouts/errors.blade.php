@if(session('alert'))
    <div class="alert alert-danger">
        {!! session('alert') !!}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
@endif
