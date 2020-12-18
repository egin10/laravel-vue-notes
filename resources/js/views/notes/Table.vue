<template>
    <div class="container">
        <h3>Table of Note</h3>
        <hr>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(note, index) in notes" :key="note.id" class="text-center">
                    <td>{{ index + 1}}</td>
                    <td><router-link :to="{ name: 'notes.show', params: { slug: note.slug } }">{{ note.title }}</router-link></td>
                    <td>{{ note.subject }}</td>
                    <td>{{ note.published }}</td>
                    <td>
                        <router-link :to="{ name: 'notes.edit', params: { slug: note.slug} }" class="btn btn-warning btn-sm">Edit</router-link>
                        <delete-note :slug="note.slug"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import DeleteNote from './Delete';

export default {
    components: {
        DeleteNote
    },
    data() {
        return {
            notes: [],
        }
    },
    mounted() {
        this.getNotes();
    },
    methods: {
        async getNotes() {
            let { data } = await axios.get('/api/notes');
            this.notes = data.data;
        },
    }
}
</script>