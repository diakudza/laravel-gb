<template>
    <div class="mt-4">
        <h2>News</h2>
        <div class="p-1 d-flex justify-content-end">
            <InertiaLink class="btn btn-dark" :href="route('newsCreateA')">ADD NEW</InertiaLink>
        </div>
        <div class="mt-2">
            <Pagination :links="news.links"/>
        </div>
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>title</th>
                <th>text</th>
                <th>category</th>
                <th>created at</th>
                <th>mod.</th>
            </tr>

            <tr v-for="item in news.data" :key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.title }}</td>
                <td>{{ item.text }}</td>
                <td>{{ item.category.title }}</td>
                <td>{{ item.created_at }}</td>
                <td>
                    <div class="d-flex flex-row">
                        <InertiaLink :href="route('newsEditA', {news: item.id})" class="btn btn-success">
                            <i
                            class="bi bi-pen"></i></InertiaLink>
                        <InertiaLink :href="route('newsDestroyA', {news: item.id})" method="delete"
                                     class="btn btn-danger"><i class="bi bi-x-lg"></i></InertiaLink>
                    </div>
                </td>
            </tr>

        </table>
    </div>
</template>

<script>
import Pagination from "../../../Share/Pagination";
import {InertiaLink} from "@inertiajs/inertia-vue3";
import LayoutAdmin from "../../../Share/LayoutAdmin";

export default {
    components: {Pagination, InertiaLink},
    Layout: LayoutAdmin,
    props: [
        'news'
    ]
}
</script>

