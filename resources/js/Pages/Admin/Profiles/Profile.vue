<template>
    <div class="mt-4">
        <h2>Profile</h2>
        <div class="border p-1">
            <div class="form-control d-flex flex-row">

                <div class="border ">
                    <img v-if="profile.type_auth === 'site'" :src="url+'/'+profile.avatar" width="150" height="200"
                         alt="avatar">
                    <img v-else :src="profile.avatar" width="150" height="200" alt="avatar">
                </div>

                <div class=" d-flex flex-column m-lg-4">
                    <div>
                        <p>Name: {{ profile.name }}</p>
                    </div>
                    <div>
                        <p>Email: {{ profile.email }}</p>
                    </div>
                    <div>
                        <p>Telephone: {{ profile.phone }}</p>
                    </div>
                    <div>
                        <p>Role: {{ profile.role }}</p>
                    </div>
                </div>

            </div>

            <div v-if="profile.feedbacks" class="border-top">
                <p> Users feedbacks</p>
                <div v-for="feedback in profile.feedbacks" class="border mt-2 d-flex justify-content-between">
                    <div>{{ feedback.text }}</div>
                    <button @click="$inertia.delete(route('feedbacks.destroy',feedback.id))"
                            class="btn-close"></button>
                </div>

            </div>

            <inertia-link :href="route('profiles.index')" class="btn btn-outline-danger">Close profile</inertia-link>
        </div>
    </div>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue3";
import LayoutAdmin from "../../../Share/LayoutAdmin";

export default {
    components: {InertiaLink},
    Layout: LayoutAdmin,
    props: [
        'profile',
        'url'
    ]
}
</script>

