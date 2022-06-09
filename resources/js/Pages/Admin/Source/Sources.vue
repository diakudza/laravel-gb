<template>
    <div class="mt-4">
        <h2>Sources</h2>
        <div class="p-1 d-flex justify-content-between">
            <inertia-link class="btn btn-dark" :href="route('parser')">Parse to DB</inertia-link>
            <inertia-link class="btn btn-dark" :href="route('startWorker')">Start worker</inertia-link>
            <inertia-link class="btn btn-dark" :href="route('sources.create')">ADD NEW</inertia-link>
        </div>

        <div class="mt-2 ">
            <Pagination :links="sources.links"/>
        </div>

        <table class="table table-hover">

            <tr>
                <th>id</th>
                <th>category</th>
                <th>text</th>
                <th>url</th>
                <th>mod.</th>
            </tr>

            <tr v-for="item in sources.data" >
                <td>{{ item.id }}</td>
                <td>{{ item.category.title }}</td>
                <td>{{ item.text }} <div v-if="!item.active">выклчюен</div></td>
                <td>{{ item.url }}</td>
                <td>
                    <div class="d-flex flex-row">
                        <inertia-link :href="route('sources.edit', item.id)" class="btn btn-success">
                            <i class="bi bi-pen"></i></inertia-link>
                        <inertia-link :href="route('sources.destroy', item.id)" method="delete" class="btn btn-danger">
                            <i class="bi bi-x-lg"></i></inertia-link>
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
        'sources'
    ]
}
</script>

<style scoped>

</style>
