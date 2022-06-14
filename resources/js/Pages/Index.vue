<template>
    <div class="">
        <input type="text"><inertia-link href="/">Главная</inertia-link>
        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <td>id</td>
                <td>title</td>
                <td>text</td>
                <td>date</td>
                <td>actions</td>
            </tr>
            </thead>
            <tr v-for="row in data">
                <td>{{ row.id }}</td>
                <td>{{ row.title }}</td>
                <td>{{ row.text }}</td>
                <td>{{ row.created_at }}</td>
                <td width="130">
                    <button @click="edit(row)" class="btn btn-sm btn-primary">Edit</button>
                    <button @click="deleteRow(row)" class="btn btn-sm btn-danger">Del</button>
                </td>
            </tr>
        </table>
    </div>
</template>
<script>
export default {
    props: ['data'],
    data() {
        return {
            editMode: false,
            form: {
                name: null,
                phone: null,
            },
        }
    },
    methods: {
        openModal: function () {
           // document.querySelector('#modal').classList.toggle('show')
            console.log(111)
        },
        closeModal: function () {
            // document.querySelector('#modal').classList.toggle('hide')
            this.reset();
            this.editMode=false;
        },
        reset: function () {
            this.form = {
                name: null,
                phone: null,
            }
        },
        save: function (data) {
            this.$inertia.post('/news', data)
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit: function (data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update: function (data) {
            if (!confirm('Sure')) return;
            data._method = 'PUT';
            this.$inertia.post('/admin/contacts/' + data.id, data)
            this.reset();
            this.closeModal();
        },
        deleteRow: function (data) {
            // if (!confirm('Sure')) return;
            data._method = 'DELETE';
            this.$inertia.post('/news/' + data.id, data)
            //this.reset();
            //this.closeModal();
        }
    }
}
</script>
