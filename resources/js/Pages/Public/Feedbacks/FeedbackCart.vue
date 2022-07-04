<template>
    <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3 d-flex justify-content-sm-between">
            <div>
                <p> {{ feedback.user.name }}</p>
            </div>
            <p>{{ feedback.created_at }}</p>
        </div>
        <div class="card-body">
            <p v-if="!showEditValue" class="card-title pricing-card-title">{{ feedback.text }}</p>
            <div v-if="showEditValue">
                <input v-model="text"
                       type="text"
                       style="width:500px;"
                       name="text"
                >
                <button class="btn btn-green" @click="editFeedback()">Save</button>
            </div>
        </div>
        <div v-if="user !== null && ( user.id === feedback.user_id ) ">
            <button class="btn btn-light" @click="showEdit(feedback.id)">Edit</button>
            <button class="btn btn-danger" @click="destroy(feedback.id)">Delete</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showEditValue: false,
            text: this.feedback.text
        }
    },
    props: {
        feedback: Array,
        user: Array
    },
    methods: {
        showEdit() {
            this.showEditValue = !this.showEditValue
        },
        destroy(e) {
            this.$emit('destroy', e)
        },
        editFeedback() {
            this.$emit('editFeedback', {id: this.feedback.id, text: this.text})
            this.showEditValue = !this.showEditValue

        }
    }
}
</script>

<style scoped>

</style>
