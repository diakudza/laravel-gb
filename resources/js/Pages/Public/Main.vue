<template>

    <div>
        <h1>Main</h1>
        <h4>Random news from our base:</h4>
        <h2>{{ randNews.title }}</h2>
        <p>{{ randNews.text }}</p>
        <p>{{ randNews.created_at }}</p>
        <div class="d-flex flex-column align-items-end">
            <h3>Last feedbacks</h3>
            <p v-for="feedback in lastFeedbacks">{{ feedback.user.name }} say: {{ feedback.text }}</p>
        </div>
    </div>

</template>
<script>

export default {
    components:
        {

        },
    props: ['randNews', 'lastFeedbacks', 'title'],
    data() {
        return {}
    },

}
</script>
