<template>
       <div class="m-2">
            Edit mode
            <form id="form"
                  @submit.prevent="submit"
                  class="form-control d-flex flex-column"
                  enctype="multipart/form-data">

                <img v-if="profile.type_auth === 'site'" :src="url+'/'+profile.avatar" width="150" height="200" alt="avatar">
                <img v-else :src="profile.avatar" width="150" height="200" alt="avatar">

                <input type="file" class="form-control" name="avatar"
                       @input="form.avatar = $event.target.files[0]">

                <input type="text" class="form-control" v-model="form.name" name="name">
                <input type="email" class="form-control" v-model="form.email" name="email">
                <input type="tel" class="form-control" v-model="form.phone" name="phone">
                <select class="form-control" v-model="form.role" name="role">
                    <option  value="0"  :selected="profile.role === 0"> User </option>
                    <option  value="1"  :selected="profile.role === 1"> Admin </option>
                    <option  value="2"  :selected="profile.role === 2"> Moderator </option>
                </select>
                <button type="submit"  class="btn ">Submit</button>
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
                name: this.$props.profile.name,
                role: this.$props.profile.role,
                email: this.$props.profile.email,
                phone: this.$props.profile.phone,
                avatar: null,
            })
        }
    },
    components: {useForm},
    methods: {
      submit() {
          this.$inertia.post(route('profiles.update', this.$props.profile.id), {_method: 'put', name: this.form.name,
              avatar: this.form.avatar,
              phone: this.form.phone,
              role: this.form.role,
              email: this.form.email,});
      }
    },
    Layout: LayoutAdmin,
    props: [
        'profile',
        'url'
    ],
}
</script>

