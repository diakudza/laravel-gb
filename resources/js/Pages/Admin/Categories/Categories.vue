<template>
    <div class="mt-4">
        <h2>Categories</h2>
        <div class="p-1 d-flex justify-content-end">
            <InertiaLink class="btn btn-dark" :href="route('categories.create')">ADD NEW</InertiaLink>
        </div>
        <div class="mt-2 ">
            <Pagination :links="categories.links"/>
        </div>
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th class="w-75">title</th>
                <th >created at</th>
                <th >mod.</th>
            </tr>
            <tr v-for="item in categories.data" :key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.title }}</td>

                <td>{{ item.created_at }}</td>
                <td>
                    <div class="d-flex flex-row justify-content-end ">
                        <InertiaLink :href="route('categories.edit', item.id)" class="btn btn-success">
                            <i class="bi bi-pen"></i></InertiaLink>
                        <InertiaLink :href="route('categories.destroy', item.id)" method="delete"
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
        'categories'
    ]
}
</script>

