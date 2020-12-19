<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3>Table of Subject</h3>
                <hr>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(subject, index) in subjects" :key="subject.id" class="text-center">
                            <td>{{ index + 1}}</td>
                            <td><router-link :to="{ name: 'subjects.show', params: { slug: subject.slug } }">{{ subject.name }}</router-link></td>
                            <td>
                                <router-link :to="{ name: 'subjects.edit', params: { slug: subject.slug } }" class="btn btn-warning btn-sm">Edit</router-link>
                                <delete-subject :slug="subject.slug"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import DeleteSubject from './Delete';

export default {
    components: {
        DeleteSubject
    },
    data() {
        return {
            subjects: []
        }
    },
    methods: {
        async getSubjects() {
            let {data} = await axios.get(`/api/subjects`);
            this.subjects = data.data;
        }
    },
    mounted() {
        this.getSubjects();
    }
}
</script>