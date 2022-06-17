<template>
       <div class="m-2">
            Edit mode
            <form id="form" @submit.prevent="form.put(route('categories.update', this.$props.category.id))"
                  class="form-control d-flex flex-column">
                <input type="text" class="form-control" v-model="form.title" name="title">
                <button type="submit" :disabled="form.processing" class="btn ">Submit</button>
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
                title: this.$props.category.title,
            })
        }
    },
    components: {useForm},
    Layout: LayoutAdmin,
    props: [
        'category'
    ],
}
</script>

