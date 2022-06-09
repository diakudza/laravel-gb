<template>
    <div class="m-2">
        Edit mode
        <form id="form" @submit.prevent="form.put(route('sources.update', this.$props.source.id))"
              class="form-control d-flex flex-column">
            <input type="text" class="form-control" v-model="form.title" name="title" placeholder="title">
            <input type="text" class="form-control" v-model="form.text" name="text"  placeholder="text">
            <input type="text" class="form-control" v-model="form.url" name="url" placeholder="url">

            <select class="form-control" v-model="form.category_id" name="category_id">
                <option v-for="category in categories"
                        :value="category.id"
                        :selected="category.id == '1'"> {{ category.title }}
                </option>
            </select>

            <div><input type="checkbox" name="active" value="1" :checked="source.active">active</div>
            <button type="submit" :disabled="form.processing" class="btn ">Update</button>
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
                title: this.$props.source.title,
                text: this.$props.source.text,
                url: this.$props.source.url,
                category_id: this.$props.source.category_id,
            })
        }
    },
    components: {Pagination, InertiaLink, useForm},
    Layout: LayoutAdmin,
    props: [
        'categories',
        'source'
    ],
}
</script>

