<template>
    <div class="container">
        <h1>{{ note.title }}</h1>
        <hr>
        <div class="mb-4">
            {{ note.published }} - {{ note.subject }}
        </div>

        {{ note.description }}

        <div class="mt-4">
            <router-link :to="{ name: 'notes.table' }" class="btn btn-outline-danger">Back</router-link>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            note: [],
        }
    },
    mounted() {
        this.getNote();
    },
    methods: {
        async getNote() {
            let {data} = await axios.get(`/api/notes/${this.$route.params.slug}`);
            this.note = data.note;
        }
    }
}
</script>