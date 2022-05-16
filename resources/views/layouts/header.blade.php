<header>
    <div class="collapse bg-dark" id="navbarHeader">
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <div class="d-flex justify-content-sm-start">
                <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center"><strong>Main</strong></a>
                <a href="{{ route('news.index') }}" class="navbar-brand d-flex align-items-center"><strong>News</strong></a>
                <a href='{{ route('feedback') }}'
                   class="navbar-brand d-flex align-items-center"><strong>Feedback</strong></a>
                <a href='{{ route('about') }}' class="navbar-brand d-flex align-items-center"><strong>About</strong></a>
            </div>
            <div class="d-flex flex-row">
                @auth()
                    <a href="{{ route('logout') }}" class="navbar-brand d-flex align-items-center">{{ auth()->user()->name }} </a>
                    @if(auth()->user()->name === 'admin')
                        <a href="{{ route('main') }}"  class="navbar-brand d-flex align-items-center"> Panel </a>
                    @endauth
                @endauth
                @guest()
{{--                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalLogin">Запустить модальное окно</button>--}}
                    <a href="#modalLogin" data-bs-toggle="modal" data-bs-target="#modalLogin" class="navbar-brand d-flex align-items-center">login</a>
                @endguest
            </div>
        </div>
    </div>
</header>
