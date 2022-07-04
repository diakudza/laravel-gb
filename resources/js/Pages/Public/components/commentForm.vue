<template>
    <button class="btn" @click="showTextArea"><i class="bi bi-chat-left-quote"></i></button>
    <form id="formComment" v-if="showTextAreaVal"
          @submit.prevent="submit">
        <textarea class="form-control" v-model="text"></textarea>
        <button class="btn" type="submit"><i class="bi bi-send"></i></button>
    </form>
</template>

<script>
export default {
    name: "commentForm",
    data() {
        return {
            showTextAreaVal: false,
            text: ''
        }
    },
    props: {
        newsId: Number,
        userId: Number,
    },
    methods: {
        showTextArea() {
            this.showTextAreaVal = !this.showTextAreaVal;
        },
        submit() {
            this.$inertia.post(route('usercomments.store'), {
                _token: this.$page.props.csrf_token,
                text: this.text,
                news_id: this.newsId,
                user_id: this.userId
            })
            this.showTextAreaVal = false;
            this.text = ''
        }
    }
}
</script>

<style>

</style>
