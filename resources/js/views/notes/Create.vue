<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">New Note</div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="store">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" v-model="form.title" id="title" class="form-control"/>
								<div v-if="theErrors.title" class="mt-2 text-danger">{{ theErrors.title[0] }}</div>
                            </div>

                            <div class="form-group">
								<label for="subject_id">Subject</label>
								<select v-model="form.subject_id" id="subject_id" class="form-control">
									<option v-for="subject in subjects" :key="subject.id" :value="subject.id">{{ subject.name }}</option>
								</select>
								<div v-if="theErrors.subject_id" class="mt-2 text-danger">{{ theErrors.subject_id[0] }}</div>
							</div>

							<div class="form-group">
								<label for="description">Description</label>
								<textarea v-model="form.description" id="description" rows="5" class="form-control"></textarea>
								<div v-if="theErrors.description" class="mt-2 text-danger">{{ theErrors.description[0] }}</div>
							</div>

							<button type="submit" class="btn btn-primary">Save</button>
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
            form: {
				subject_id: '',
				title: '',
				description: '',
			},
			subjects: [],
			theErrors: [],
        };
    },
    mounted() {
        this.getSubjects();
    },
    methods: {
        async getSubjects() {
            let response = await axios.get("/api/subjects");
            if (response.status === 200) {
                this.subjects = response.data;
            }
		},
		
        async store() {
			try {
				let response = await axios.post("/api/notes/create-new-note", this.form)
				if(response.status === 200) {
					this.form.title = this.form.subject_id = this.form.description = "";
					this.theErrors = [];
					
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
				}

			}catch(e) {
				this.$toasted.show("Something went wrong...", {
						theme : 'outline',
						type : 'danger',
						duration : 2000,
						action : {
							text : 'Close',
							onClick : (e, toastObject) => {
								toastObject.goAway(0);
							}
						},
					})
			}
        }
    }
};
</script>
