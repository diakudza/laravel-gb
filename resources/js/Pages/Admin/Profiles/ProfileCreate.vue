<template>
    <div class="m-2">
        Create mode
        <form id="form" method="post" @submit.prevent="form.post(route('profiles.store'))"
              class="form-control d-flex flex-column">
            <input type="file" class="form-control" name="avatar"
                   @input="form.avatar = $event.target.files[0]">
            <input type="text" class="form-control" v-model="form.name" name="name" placeholder="name">
            <input type="email" class="form-control" v-model="form.email" name="email" placeholder="email">
            <input type="tel" class="form-control" v-model="form.phone" name="phone" placeholder="phone">
            <input type="password" class="form-control" v-model="form.password" name="password" placeholder="password">
            <input type="password" class="form-control" v-model="form.password_confirmation" name="password_confirmation" placeholder="password confirm">
            <select class="form-control" v-model="form.role" name="role" placeholder="role">
                <option value="0" selected >User</option>
                <option value="1">Admin</option>
                <option value="2">Moderator</option>
            </select>
            <button type="submit" class="btn">Submit</button>
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
                name: null,
                avatar: null,
                email: null,
                phone: null,
                password: null,
                password_confirmation: null,
            })
        }
    },
    components: {useForm},
    Layout: LayoutAdmin,
    props: [

    ]
}
</script>

