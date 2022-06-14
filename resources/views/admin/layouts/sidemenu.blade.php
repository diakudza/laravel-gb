<div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href=" {{ route("new.index") }}">
                    <span data-feather="file"></span>
                    News
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("categories.index") }}">
                    <span data-feather="shopping-cart"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("feedbacks.index") }}">
                    <span data-feather="users"></span>
                    Feedbacks
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("profiles.index") }}">
                    <span data-feather="users"></span>
                    Profiles
                </a>
            </li>
            <li class="nav-item">
                <form action=" {{route('parser') }}" method="post">
                    @csrf
                    <input type="text" name="url" value="https://news.yandex.ru/music.rss">
                    <button class="nav-link" type='submit' href="{{ route("parser") }}">
                        Parser
                    </button>
                </form>

            </li>
        </ul>
    </div>

