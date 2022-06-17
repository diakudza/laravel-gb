<template>
    <div class="mt-4">
        <h2>Profiles</h2>
        <div class="p-1 d-flex justify-content-end">
            <InertiaLink class="btn btn-dark" :href="route('profiles.create')">ADD NEW</InertiaLink>
        </div>
        <div class="mt-2 ">
            <Pagination :links="profiles.links"/>
        </div>
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>avatar</th>
                <th>name</th>
                <th>email</th>
                <th>phone</th>
                <th>created at</th>
                <td>type_auth</td>
                <th>mod.</th>
            </tr>
            <tr v-for="item in profiles.data" :key="item.id">
                <td>{{ item.id }}</td>
                <td>
                    <div v-if="item.avatar">
                    <img v-if="item.type_auth === 'site'" :src="url+'/'+item.avatar" width="40" height="40"
                         alt="avatar">
                    <img v-else :src="item.avatar" width="40" height="40" alt="avatar">
                    </div>
                </td>
                <InertiaLink :href="route('profiles.show', item.id)">
                    <td>{{ item.name }}</td>
                </InertiaLink>
                <td>{{ item.email }}</td>
                <td>{{ item.phone }}</td>
                <td>{{ item.created_at }}</td>
                <td>{{ item.type_auth }}</td>
                <td>
                    <div class="d-flex flex-row justify-content-end ">
                        <InertiaLink :href="route('profiles.edit', item.id)" class="btn btn-success">
                            <i class="bi bi-pen"></i></InertiaLink>
                        <InertiaLink :href="route('profiles.destroy', item.id)" method="delete"
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
        'profiles',
        'url'
    ]
}
</script>

