<template>

    <div>
        <h1>Cabinet for {{form.name}}</h1>
        <form id="form" @submit.prevent="submit" class="form-control d-flex flex-column" enctype="multipart/form-data">
            <img v-if="user.type_auth === 'site'" :src="url+'/'+user.avatar" width="150" height="200" alt="avatar">
            <div>
                <p>Your login/email: {{ user.email }}</p>
                <p>Your role: {{ user.role }}</p>
                <p>Your registration date: {{ user.created_at }}</p>
            </div>
            <input type="text" class="form-control" v-model="form.name" name="name">
            <input type="text" class="form-control" v-model="form.phone" name="phone">
            <input type="file"
                   class="form-control"

                   name="avatar"
                   @input="form.avatar = $event.target.files[0]">
            <button type="submit" :disabled="form.processing" class="btn ">Submit</button>
        </form>
    </div>
</template>
<script>

import {useForm} from "@inertiajs/inertia-vue3";

export default {
    components:
        {
            useForm
        },

    props:
        [
            'user',
            'url'
        ],
    data() {
        return {
            form: useForm({
                user_id: this.$props.user.id,
                name: this.$props.user.name,
                phone: this.$props.user.phone,
                avatar: null,

            })
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('useredit', {user_id : this.form.user_id}),
                {
                    _method: 'put',
                    name: this.form.name,
                    avatar: this.form.avatar,
                    phone: this.form.phone,
                });
        }
    }

}
</script>
