<template>
    <div v-if="links.length > 1" class="mt-2">
        <nav>
            <ul class="pagination">
                <li v-for="(link, k) in links"
                    class="page-item" :key="k"
                    :disabled="link.url === null"
                    :class="{'active': link.active, 'disabled': link.url === null}">
                    <Link class="page-link"

                          v-html="link.label"
                          :href="link.url"
                          target="_top">2
                    </Link>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link
    },
    props: {
        links: Array,
    }
}
</script>

