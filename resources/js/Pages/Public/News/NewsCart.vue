<template>
    <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3 d-flex justify-content-sm-between">
            <div>
                <h3 class="my-0 fw-normal mb-3">{{ news.title }}</h3>
                <p>Cat.: {{ news.category.title }}</p>
            </div>
            <p>{{ news.created_at }}</p>
        </div>
        <div class="card-body">
            <p class="card-title pricing-card-title">{{ news.text }}</p>
            <div v-if="news.comments[0]">
                <hr>
                <p @click="showComments()">Comments {{news.comments.length }}</p>
            </div>
            <div class="p-1" v-show="showCommentsVar">
                <div v-for="comment in news.comments">
                    {{ comment.created_at }}
                    <br>
                    {{ comment.user.name }} : {{ comment.text }}
                </div>
            </div>
            <div v-if="user">
                <CommentForm :newsId="this.$props.news.id" :userId="$props.user.id"></CommentForm>
            </div>
        </div>

        <div v-if="user !== null && user.id === news.user_id">
            <button class="btn btn-light" @click="">Редактирвоать</button>
            <button class="btn btn-danger" @click="destroy(news.id)">Удалить</button>
        </div>
    </div>

</template>

<script>
import CommentForm from "../components/commentForm";

export default {
    name: "NewsCart",
    components: {CommentForm},
    data() {
        return {
            showTextAreaVal: false,
            showCommentsVar: false
        }
    },
    props: {
        news: Array,
        user: Array
    },
    methods: {
        showTextArea() {
            this.showTextAreaVal = !this.showTextAreaVal;
        },
        showComments() {
            this.showCommentsVar = !this.showCommentsVar;
        },
        destroy(e) {
            this.$emit('destroy', e)
        }
    }
}
</script>

<style>

</style>
