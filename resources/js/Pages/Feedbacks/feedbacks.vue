<template>
    <Head :title="title"/>
    <div class="d-flex flex-column">
        <div class="align-content-center d-flex flex-row justify-content-between">
            <span class="fs-1">Feedbacks page</span>
            <button v-if="$attrs.auth.user !== null"
                class="btn mb-lg-4 btn-success"
                @click="changeFormVisible"
            >CREATE NEW
            </button>
        </div>
        <FeedbackFormAdd v-show="formShow"/>
        <div class="mt-2">
            <Pagination :links="feedbacks.links" />
        </div>
        <FeedbackCart @destroy="destroy" :news="feedbacks" :user="$attrs.auth.user"/>

    </div>
</template>
<script>
import {Head} from '@inertiajs/inertia-vue3'
import FeedbackCart from "./FeedbackCart";
import Pagination from "../../Share/Pagination";
import FeedbackFormAdd from "./FeedbackFormAdd";

export default {
    components: {
        Head,
        FeedbackCart,
        Pagination,
        FeedbackFormAdd
    },
    props: ['feedbacks', 'title'],
    data() {
        return {
            formShow: false
        }
    },
    methods: {
        changeFormVisible() {
          this.formShow = !this.formShow
        },
        destroy(id) {
             if (confirm('Are you sure ?')) {
                // this.$inertia.delete(this.route('news.destroy', id))
            }
        }
    }
}
</script>
