<template>
    <div  v-if="news.total > 0" v-for="item in news.data" class="card mb-4 rounded-3 shadow-sm" :key="item.id">
        <div class="card-header py-3 d-flex justify-content-sm-between">
            <div>
             <p>Cat.: {{item.category }}</p>
                <input ref="input" type="text" name="category" value="" id="">
            </div>
            <p>{{ item.created_at }}</p>
        </div>
        <div class="card-body">
            <p class="card-title pricing-card-title">{{ item.text }}</p>
            <input v-if="showEditValue" type="text" name="text" value="text">
        </div>
        <div v-if="user !== null && user.id === item.user_id">
            <button class="btn btn-light" @click="showEdit(item.id)">Редактирвоать</button>
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
    data() {
        return {
            showEditValue: false
        }
    },
    props:{
        news: Array,
        user: Array
    },
    methods: {
        showEdit() {
            console.log(this.$refs.input)
        },
        destroy(e) {
            this.$emit('destroy',e)
        }
    }
}
</script>

<style scoped>

</style>
