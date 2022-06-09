<template>
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <Link class="nav-link" :href="route('newsIndexA')">
                <span data-feather="file"></span>
                News
                </Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :href="route('categories.index')">
                <span data-feather="shopping-cart"></span>
                Categories
                </Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :href="route('feedbacks.index')">
                <span data-feather="users"></span>
                Feedbacks
                </Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :href="route('profiles.index')">
                <span data-feather="users"></span>
                Profiles
                </Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link" :href="route('sources.index')">
                <span data-feather="users"></span>
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

