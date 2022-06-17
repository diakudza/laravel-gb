<template>
    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <Link href="#">Back to top</Link>
            </p>
            <p class="mb-1">Created by Diakudza for dear GB</p>
            <p class="mb-0">What's news? <Link :href="route('home')">Visit the homepage</Link> </p>
        </div>
    </footer>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: 'Footer',
    components: {
        Link,
    }
}
</script>

<style scoped>

</style>
