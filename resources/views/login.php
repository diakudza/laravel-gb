
@section('login')
<form action="" method="post">
    @csrf
    <div class="row g-3">
        <div class="col-12">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="login">
        </div>
        <div class="col-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
        </div>

        <button type="submit" class="w-100 btn btn-primary btn-lg">Login</button>
    </div>
</form>
@endsection
