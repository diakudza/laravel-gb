<div class="modal fade hide" tabindex="-1" aria-modal="true" role="dialog" id="modalLogin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <!-- <h5 class="modal-title">Modal title</h5> -->
                <h2 class="fw-bold mb-0">Sing in</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="" action=" {{ route('login') }}" method="post" >
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-4" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <p>Don't have account? <a href="{{ route('registrationform') }}">Sing up</a></p>
                    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
