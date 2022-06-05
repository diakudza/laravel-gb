<template>
    <div  v-if="news.total > 0" v-for="item in news.data" class="card mb-4 rounded-3 shadow-sm" :key="item.id">
        <div class="card-header py-3 d-flex justify-content-sm-between">
            <div>
                <h3 class="my-0 fw-normal mb-3">{{ item.title }}</h3>
                <p>Cat.: {{item.category }}</p>
            </div>
            <p>{{ item.created_at }}</p>
        </div>
        <div class="card-body">
            <p class="card-title pricing-card-title">{{ item.text }}</p>
        </div>
        <div v-if="user !== null && user.id === item.user_id">
            <button class="btn btn-light" @click="">Редактирвоать</button>
            <button class="btn btn-danger" @click="destroy(item.id)">Удалить</button>
        </div>
    </div>
    <div v-else >
        <p>новостей нет</p>
    </div>
</template>

<script>
export default {
    name: "NewsCart",
    props:{
        news: Array,
        user: Array
    },
    methods: {
        destroy(e) {
            this.$emit('destroy',e)
        }
    }
}
</script>

<style scoped>

</style>
