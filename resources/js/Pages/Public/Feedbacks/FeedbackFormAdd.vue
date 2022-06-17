<template>

    <form
        id="form"
        class="align-self-center w-50 mt-2"
        @submit.prevent="submit"
    >

        <div class="row g-3">
           <div class="col-12">
                <label for="text" class="form-label">Text</label>
                <input type="text" class="form-control" id="text" name="text"
                       v-model="text"
                       placeholder="text">
           </div>
           <button type="submit" class="w-100 btn btn-primary btn-lg">CREATE</button>
        </div>
    </form>
</template>

<script>

export default {
    props: [
        'user'
    ],
    data() {
        return {
            text: '',
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('feedbacksStore'), {
                _token: this.$page.props.csrf_token,
                text: this.text,
                user_id: this.user.id
            })
        }
    }
}
</script>

