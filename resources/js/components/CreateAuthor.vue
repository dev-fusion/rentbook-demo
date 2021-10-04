<template>
    <div>
        <h3 class="text-center">Create Author</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addAuthor">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="author.name">
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" v-model="author.surname">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            author: {},
        }
    },
    methods: {
        addAuthor() {
            this.axios
                .post('/api/authors', this.author)
                .then(response => (
                    this.$router.push({ name: 'authors.list' })
                ))
                .catch(err => console.error(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>
