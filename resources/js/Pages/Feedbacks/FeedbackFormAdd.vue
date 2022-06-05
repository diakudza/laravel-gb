<template>
    <form
        id="form"
        class="align-self-center w-50 mt-2"
        @submit.prevent="submit"
    >

        <div class="row g-3">
            <div class="col-12">
                <label for="email" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" v-model="form.title" name="title" placeholder="title">
            </div>
            <div class="col-12">
                <label for="text" class="form-label">Text</label>
                <input type="text" class="form-control" id="text" name="text"
                       v-model="form.text"
                       :class="{'alert': form.errors.name }"
                       placeholder="text">
            </div>
            <div v-if="form.errors.name">
                <p>{{ form.errors.name}}</p>
            </div>
            <button type="submit" class="w-100 btn btn-primary btn-lg"> CREATE</button>
        </div>

    </form>
</template>

<script>

import { useForm } from '@inertiajs/inertia-vue3';
export default {
    setup: function () {
        const form = useForm({
            title: null,
            text: null,
            user_id: null,

        })

        function submit() {
            alert(this.props.user_id)

            this.$inertia.post(route('feedbacksStore', {_token: this.$page.props.csrf_token,
                                                            title: form.title,
                                                            text: form.text,
                                                            user_id: this.props.user.id
            }))
        }

        return { form, submit}
    },
    props: [
        'user'
    ],

}
</script>

