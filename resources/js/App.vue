<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/"><app-name></app-name></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <router-link :to="{name: 'books.list'}" class="nav-item nav-link">Books</router-link>
                    <router-link :to="{name: 'authors.list'}" class="nav-item nav-link">Authors</router-link>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Create
                        </a>
                        <div class="dropdown-menu">
                            <router-link :to="{name: 'books.create'}" class="nav-item nav-link">Create Book</router-link>
                            <router-link :to="{name: 'authors.create'}" class="nav-item nav-link">Create Author</router-link>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>
