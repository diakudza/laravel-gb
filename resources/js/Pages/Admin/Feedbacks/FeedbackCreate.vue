<template>
    <div class="m-2">
        Create mode
        <form id="form" method="post" @submit.prevent="form.post(route('feedbacks.store'))"
              class="form-control d-flex flex-column">
            <input type="text" class="form-control" v-model="form.text" name="text">
            <select class="form-control" v-model="form.user_id" name="user_id" >
                <option v-for="user in users"
                        :value="user.id"
                        > {{user.name}} </option>
            </select>
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
                text: null,
                user_id: null
            })
        }
    },
    components: {useForm},
    Layout: LayoutAdmin,
    props: [
        'users'
    ]
}
</script>

