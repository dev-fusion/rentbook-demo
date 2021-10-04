<template>
    <div>
        <h2 class="text-center">List of Authors</h2>

        <div class="row mb-3">
            <div class="col-4">
                <label class="sr-only" for="search-books">Search</label>
                <input type="text" class="form-control" id="search-books" placeholder="Search for Author"
                       v-model="search">
            </div>

            <div class="col-8 text-right">
                <router-link :to="{name: 'authors.create'}" class="btn btn-primary">Add New Author</router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Surname</th>
                        <th>Name</th>
                        <th>No. of Books</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="author in filteredAuthors" :key="author.id">
                        <td>{{ author.surname }}</td>
                        <td>{{ author.name }}</td>
                        <td>{{ author.books.length }}</td>
                        <td class="text-right">
                            <div class="btn-group" role="group">
                                <router-link :to="{name: 'authors.edit', params: { id: author.id }}" class="btn btn-success">Edit</router-link>
                                <button class="btn btn-danger" @click="deleteAuthor(author.id)">Delete</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            authors: [],
            search: ``
        }
    },
    created() {
        this.axios
            .get('/api/authors')
            .then(response => {
                this.authors = response.data;
            });
    },
    methods: {
        deleteAuthor(id) {
            this.axios
                .delete(`/api/authors/${id}`)
                .then(response => {
                    let i = this.authors.map(data => data.id).indexOf(id);
                    this.authors.splice(i, 1)
                });
        }
    },
    computed: {
        filteredAuthors: function () {
            return this.authors.filter(author => {
                let searchString = this.search.toLowerCase();

                return author.fullname.toLowerCase().match(searchString) !== null;
            });
        }
    }
}
</script>
