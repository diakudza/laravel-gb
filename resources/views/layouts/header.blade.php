<header>
    <div class="collapse bg-dark" id="navbarHeader">
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container justify-content-sm-start">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center"><strong>Main</strong></a>
            <a href="{{ route('news.index') }}" class="navbar-brand d-flex align-items-center"><strong>News</strong></a>
            <a href='{{ route('feedback') }}' class="navbar-brand d-flex align-items-center"><strong>Feedback</strong></a>
            <a href='{{ route('about') }}' class="navbar-brand d-flex align-items-center"><strong>About</strong></a>
        </div>
        <div>
            @auth()
                <a href="{{ route('logout') }}" class="navbar-brand d-flex align-items-center">logout</a>
            @endauth
            @guest()
                    <a href="{{ route('login') }}" class="navbar-brand d-flex align-items-center">login</a>
                @endguest
        </div>
    </div>
</header>
