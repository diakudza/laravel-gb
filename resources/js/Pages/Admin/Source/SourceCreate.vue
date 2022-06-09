<template>
    <div class="m-2">
        Create mode
        <form method="post" @submit.prevent="submit" class="form-control d-flex flex-column" >
            <input type="text" class="form-control" v-model="form.title" name="title" placeholder="title">
            <input type="text" class="form-control" v-model="form.text" name="text" placeholder="text">
            <input type="text" class="form-control" v-model="form.url" name="url" placeholder="url">
            <select class="form-control" v-model="form.category_id" name="category_id" >
                <option v-for="category in categories"
                        :value="category.id"
                        :selected="category.id == 1"> {{category.id}} {{category.title}} </option>
            </select>
            <button type="submit" class="btn ">Submit</button>
        </form>
    </div>
</template>

<script>
import Pagination from "../../../Share/Pagination";
import {InertiaLink} from "@inertiajs/inertia-vue3";
import LayoutAdmin from "../../../Share/LayoutAdmin";
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    setup: function () {
        const form = useForm({
            title: null,
            text: null,
            url: null,
            category_id: null,
        })

        function submit() {
            this.$inertia.post(route('sources.store', {_token: this.$page.props.csrf_token,
                                                    title: form.title,
                                                    text: form.text,
                                                    url: form.url,
                                                    category_id: form.category_id}))
        }

        return { form, submit}
    },
    components: {Pagination, InertiaLink, useForm},
    Layout: LayoutAdmin,
    props: [
        'categories'
    ]
}
</script>

