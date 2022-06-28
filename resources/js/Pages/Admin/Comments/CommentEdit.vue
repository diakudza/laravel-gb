<template>
       <div class="m-2">
            Edit mode
            <form id="form" @submit.prevent="form.put(route('comments.update', this.$props.comment.id))"
                  class="form-control d-flex flex-column">
                <input type="text" class="form-control" v-model="form.text" name="text">
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
                text: this.$props.comment.text,
                user_id: this.$props.comment.name,
            })
        }
    },
    components: {useForm},
    Layout: LayoutAdmin,
    props: [
        'comment',
        'users'
    ],
}
</script>

