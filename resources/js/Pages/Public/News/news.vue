<template>
    <Head :title="title"/>
    <div class="d-flex flex-column">
        <div class="align-content-center d-flex flex-row justify-content-between">
            <span class="fs-1">News page</span>
            <button v-if="$attrs.auth.user !== null"
                class="btn mb-lg-4 btn-success"
                @click="changeFormVisible"
            >CREATE NEW
            </button>
        </div>
        <NewsFormAdd v-show="formShow"/>
        <div class="mt-2">
            <Pagination :links="news.links" />
        </div>
        <NewsCart v-for="item in news.data"
                  :key="item.id"
                  @destroy="destroy"
                  @editFeedback="editFeedback"
                  :news="item"
                  :user="$attrs.auth.user"
        />

    </div>
</template>
<script>
import {Head} from '@inertiajs/inertia-vue3'
import NewsCart from "./NewsCart";
import Pagination from "../../../Share/Pagination";
import NewsFormAdd from "./NewsFormAdd";
export default {
    components: {Head, NewsCart, Pagination, NewsFormAdd},
    props: ['news', 'title'],
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
                this.$inertia.delete(this.route('news.destroy', id))
            }
        }
    }
}
</script>
