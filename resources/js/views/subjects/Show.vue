<template>
    <div class="container">
        <h1>{{ subject.name }}</h1>
        <hr>
        <div class="mt-4">
            <router-link :to="{ name: 'subjects.table' }" class="btn btn-outline-danger">Back</router-link>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            subject: [],
        }
    },
    mounted() {
        this.getSubject();
    },
    methods: {
        async getSubject() {
            let {data} = await axios.get(`/api/subjects/${this.$route.params.slug}`);
            this.subject = data.subject;
        }
    }
}
</script>