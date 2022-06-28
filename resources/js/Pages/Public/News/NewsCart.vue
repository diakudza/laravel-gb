<template>
    <div class="card mb-4 rounded-3 shadow-sm" >
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
                Comments
            </div>
            <div class="p-1">

                <div v-for="comment in news.comments">
                    {{ comment.user.name }} : {{ comment.text }} {{ comment.created_at }}
                </div>
            </div>

            <div v-if="user">
                <button class="btn" @click="showTextArea"><i class="bi bi-chat-left-quote"></i></button>
                <textarea v-if="showTextAreaVal" class="form-control"></textarea>
            </div>

        </div>

        <div v-if="user !== null && user.id === news.user_id">
            <button class="btn btn-light" @click="">Редактирвоать</button>
            <button class="btn btn-danger" @click="destroy(news.id)">Удалить</button>
        </div>
    </div>

</template>

<script>
export default {
    name: "NewsCart",
    data() {
        return {
            showTextAreaVal: false
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
        destroy(e) {
            this.$emit('destroy', e)
        }
    }
}
</script>

<style>

</style>
