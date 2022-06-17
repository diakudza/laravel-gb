<template>
    <div class="m-2">
        Create mode
        <form id="form" method="post" @submit.prevent="form.post(route('categories.store'))"
              class="form-control d-flex flex-column">
            <input type="text" class="form-control" v-model="form.title" name="title">
            <button type="submit" class="btn ">Submit</button>
        </form>
    </div>
</template>

<script>

import LayoutAdmin from "../../../Share/LayoutAdmin";
import {useForm} from '@inertiajs/inertia-vue3';

export default {
    data() {
        return {
            form: useForm({
                title: null,
            })
        }
    },
    components: {useForm},
    Layout: LayoutAdmin,
}
</script>

