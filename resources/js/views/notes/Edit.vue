<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Note</div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="update">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" v-model="form.title" id="title" class="form-control"/>
								<div v-if="theErrors.title" class="mt-2 text-danger">{{ theErrors.title[0] }}</div>
                            </div>

                            <div class="form-group">
								<label for="subject_id">Subject</label>
								<select @change="selectedSubject" id="subject_id" class="form-control">
                                    <option :value="form.subjectId" v-text="form.subject"></option>
                                    <template v-for="subject in subjects">
                                        <option v-if="form.subjectId !== subject.id" :key="subject.id" :value="subject.id">
                                            {{ subject.name }}
                                        </option>
                                    </template>
								</select>
								<div v-if="theErrors.subject_id" class="mt-2 text-danger">{{ theErrors.subject_id[0] }}</div>
							</div>

							<div class="form-group">
								<label for="description">Description</label>
								<textarea v-model="form.description" id="description" rows="5" class="form-control"></textarea>
								<div v-if="theErrors.description" class="mt-2 text-danger">{{ theErrors.description[0] }}</div>
							</div>

							<router-link :to="{ name: 'notes.table' }" class="btn btn-outline-danger">Back</router-link>
							<button type="submit" class="btn btn-primary">
                                Update
                                <template v-if="loading">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: inline; shape-rendering: auto;" width="25px" height="25px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><g transform="rotate(0 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(30 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(60 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(90 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(120 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(150 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(180 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(210 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(240 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(270 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(300 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>  </rect></g><g transform="rotate(330 50 50)">  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#f5f5f5">    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>  </rect></g><!-- [ldio] generated by https://loading.io/ --></svg>
								</template>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: [],
			subjects: [],
            theErrors: [],
            selected: '',
            loading: false,
        };
    },
    mounted() {
        this.getSubjects();
        this.getNote();
    },
    methods: {
        async getSubjects() {
            let {data} = await axios.get("/api/subjects");
                this.subjects = data.data;
		},
		
        async getNote() {
            let {data} = await axios.get(`/api/notes/${this.$route.params.slug}`);
            this.form = data.note;
        },

        selectedSubject(e) {
            this.selected = e.target.value;
        },

        async update() {
            this.loading = true;
            
            this.form.subject_id = this.selected || this.form.subjectId;
            
            let response = await axios.patch(`/api/notes/${this.$route.params.slug}/edit`, this.form)
            if(response.status === 200) {
                this.$toasted.show(response.data.message, {
                    theme : 'outline',
                    type : 'success',
                    duration : 2000,
                    action : {
                        text : 'Close',
                        onClick : (e, toastObject) => {
                            toastObject.goAway(0);
                        }
                    },
                });
                
                this.$router.push({name: 'notes.table'});
            }
        }
    }
};
</script>
