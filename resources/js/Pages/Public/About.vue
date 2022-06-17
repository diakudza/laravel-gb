<template>

    <Head :title="title"/>

    <h1>About</h1>
    <p> {{ text }}</p>

</template>
<script>

import {Head} from '@inertiajs/inertia-vue3'

export default {
    components:
        {
            Head
        },
    props: ['text', 'title'],
    data() {
        return {}
    },

}
</script>
