<template>
    <button ref="deleteSubject" @click.prevent="destroySubject" class="btn btn-danger btn-sm">Delete</button>
</template>

<script>
export default {
    props: ['slug'],
    methods: {
        async destroySubject() {
            let q = window.confirm("Are you sure ?");
            if(q) {
                let response = await axios.delete(`/api/subjects/${this.slug}/delete`);
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

                    // Delete element <tr> html
                    this.$refs.deleteSubject.parentNode.parentNode.remove();
                }
            }
        }
    }
}
</script>