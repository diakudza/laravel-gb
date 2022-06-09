<template>
    <div class="m-2">
        Edit mode
        <form id="form" @submit.prevent="form.put(route('newsUpdateA', this.$attrs.new.id))"
              class="form-control d-flex flex-column">
            <input type="text" class="form-control" v-model="form.title" name="title">
            <textarea type="text" class="form-control" v-model="form.text" name="text"></textarea>
            <select class="form-control" v-model="form.category_id" name="category_id">
                <option v-for="category in categories"
                        :value="category.id"
                        :selected="category.id == '1'"> {{ category.title }}
                </option>
            </select>
            <button type="submit" :disabled="form.processing" class="btn ">Submit</button>
        </form>
    </div>
</template>

<script>
import Pagination from "../../../Share/Pagination";
import {InertiaLink} from "@inertiajs/inertia-vue3";
import LayoutAdmin from "../../../Share/LayoutAdmin";
import {useForm} from '@inertiajs/inertia-vue3';

export default {
    data() {
        return {
            form: useForm({
                title: this.$attrs.new.title,
                text: this.$attrs.new.text,
                category_id: this.$attrs.new.category_id,
            })
        }
    },
    components: {Pagination, InertiaLink, useForm},
    Layout: LayoutAdmin,
    props: [
        'categories'
    ],
}
</script>

