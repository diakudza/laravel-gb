<template>
       <div class="m-2">
            Edit mode
            <form id="form" @submit.prevent="form.put(route('feedbacks.update', this.$props.feedback.id))"
                  class="form-control d-flex flex-column">
                <input type="text" class="form-control" v-model="form.text" name="text">
                <select class="form-control" v-model="form.user_id" name="user_id">
                    <option v-for="user in users"
                            :value="user.id"
                            :selected="user.id === feedback.user_id">
                        {{ user.name }}
                    </option>
                </select>
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
                text: this.$props.feedback.text,
                user_id: this.$props.feedback.name,
            })
        }
    },
    components: {useForm},
    Layout: LayoutAdmin,
    props: [
        'feedback',
        'users'
    ],
}
</script>

