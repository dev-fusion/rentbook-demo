<template>
    <div>
        <h3 class="text-center">Edit Book</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateBook">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="book.title">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <select class="form-control" v-model="book.author_id">
                            <option v-for="author in authors" :value="author.id" :key="author.id">
                                {{ author.fullname }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkbox" v-model="book.is_borrowed" true-value="1" false-value="0">
                        <label for="checkbox">Is borrowed</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            book: {},
            author: null,
            authors: {}
        }
    },
    created() {
        this.axios
            .get(`/api/books/${this.$route.params.id}`)
            .then((res) => {
                this.book = res.data;
                this.author = this.book.author_id;
            });

        this.axios
            .get(`/api/authors`)
            .then((res) => {
                this.authors = res.data;
            });
    },
    methods: {
        updateBook() {
            this.axios
                .patch(`/api/books/${this.$route.params.id}`, this.book)
                .then((res) => {
                    this.$router.push({ name: 'books.list' });
                });
        }
    }
}
</script>
