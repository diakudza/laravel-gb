<template>
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <Link class="nav-link" :href="route('newsIndexA')">
                    <span data-feather="file"></span>
                    <i class="bi bi-newspaper"></i>
                    News
                </Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :href="route('categories.index')">
                    <span data-feather="shopping-cart"></span>
                    <i class="bi bi-tags"></i>
                    Categories
                </Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :href="route('comments.index')">
                    <span data-feather="users"></span>
                    <i class="bi bi-chat-left-text"></i>
                    Comments
                </Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :href="route('feedbacks.index')">
                    <span data-feather="users"></span>
                    <i class="bi bi-chat-left-heart"></i>
                    Feedbacks
                </Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :href="route('profiles.index')">
                    <span data-feather="users"></span>
                    <i class="bi bi-person-square"></i>
                    Profiles
                </Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :href="route('sources.index')">
                    <span data-feather="users"></span>
                    <i class="bi bi-rss"></i>
                    Sources
                </Link>
            </li>
        </ul>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    }
}
</script>

