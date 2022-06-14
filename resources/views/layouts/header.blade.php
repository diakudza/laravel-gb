<header>
    <div class="navbar navbar-dark bg-dark shadow-sm ">
        <div class="container">
            <div class="d-flex justify-content-sm-start">
                <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center"><strong>Main</strong></a>
                <a href="{{ route('news.index') }}" class="navbar-brand d-flex align-items-center"><strong>News</strong></a>
                <a href='{{ route('feedbacks') }}'
                   class="navbar-brand d-flex align-items-center"><strong>Feedback</strong></a>
                <a href='{{ route('about') }}' class="navbar-brand d-flex align-items-center"><strong>About</strong></a>
                @auth()
                    @if(auth()->user()->role === 1)
                        <a href="{{ route('main') }}" class="navbar-brand d-flex align-items-center"> Panel </a>
                    @endif
                @endauth

            </div>
            <div class="d-flex flex-row">
                @auth()
                    <a href="{{ route('logout') }}" class="navbar-brand d-flex align-items-center">
                        {{ auth()->user()->name }}
                        <img src="@if(auth()->user()->type_auth === 'vk') {{ auth()->user()->avatar }}
                                    @elseif(auth()->user()->type_auth === 'site') {{asset(auth()->user()->avatar)}} @endif
                                    " class="rounded-2" height="40">
                    </a>

                @endauth
                @guest()
                    <a href="{{ route('registrationform') }}" class="navbar-brand d-flex align-items-center">SingUp</a>
                    @if(request()->route()->getName() != 'loginform' )
                        <a href="#"  onclick="document.querySelector('.mydropform').classList.toggle('show')" class="navbar-brand d-flex align-items-center">SingIn</a>
                    @endif
                @endguest

                <form class="mydropform dropdown-menu p-4
                    @if(session('alert'))
                    show" data-bs-popper="none"
                    @else "
                    @endif
                      action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleDropdownFormEmail2"
                               placeholder="email@example.com" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleDropdownFormPassword2" name="password"
                               placeholder="Password">
                    </div>
                    @if(session('alert'))
                    <div class="alert alert-danger">{{ session('alert') }}</div>
                    @endif
                    <a href="{{route('vklogin')}}" class="mt-2">SingIn with VK</a><br>
                    <a href="{{route('yalogin')}}" class="mt-2">SingIn with YA</a><br>
                    <button type="submit" class="btn btn-primary mt-2">Sign in</button>
                </form>
            </div>

        </div>
    </div>

</header>
