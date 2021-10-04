<template>
    <div>
        <h2 class="text-center">List of Books</h2>

        <div class="row mb-3">
            <div class="col-4">
                <label class="sr-only" for="search-books">Search</label>
                <input type="text" class="form-control" id="search-books" placeholder="Search for Book or Author"
                       v-model="search">
            </div>

            <div class="col-8 text-right">
                <router-link :to="{name: 'books.create'}" class="btn btn-primary">Add New Book</router-link>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Borrowed</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="book in filteredBooks" :key="book.id">
                        <td>{{ book.title }}</td>
                        <td>{{ book.author.fullname }}</td>
                        <td><input type="checkbox" id="checkbox" v-model="book.is_borrowed"
                                   @change="toggleBorrowed(book)"
                                   true-value="1" false-value="0"></td>
                        <td class="text-right">
                            <div class="btn-group" role="group">
                                <router-link :to="{name: 'books.edit', params: { id: book.id }}" class="btn btn-success">Edit</router-link>
                                <button class="btn btn-danger" @click="deleteBook(book.id)">Delete</button>
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
            books: [],
            search: ``
        }
    },
    created() {
        this.axios
            .get('/api/books')
            .then(response => {
                this.books = response.data;
            });
    },
    methods: {
        deleteBook(id) {
            this.axios
                .delete(`/api/books/${id}`)
                .then(response => {
                    let i = this.books.map(data => data.id).indexOf(id);
                    this.books.splice(i, 1)
                });
        },
        toggleBorrowed(book) {
            this.axios
                .patch(`/api/books/${book.id}`, {'is_borrowed': book.is_borrowed});
        }
    },
    computed: {
        filteredBooks: function () {
            return this.books.filter(book => {
                let searchString = this.search.toLowerCase();

                return book.title.toLowerCase().match(searchString) !== null || book.author.fullname.toLowerCase().match(searchString) !== null;
            });
        }
    }
}
</script>
