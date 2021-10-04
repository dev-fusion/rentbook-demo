import AllBooks from './components/AllBooks.vue';
import CreateBook from './components/CreateBook.vue';
import EditBook from './components/EditBook.vue';
import AllAuthors from "./components/AllAuthors";
import CreateAuthor from "./components/CreateAuthor";
import EditAuthor from "./components/EditAuthor";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllBooks
    },
    {
        name: 'books.list',
        path: '/books',
        component: AllBooks
    },
    {
        name: 'books.create',
        path: '/books/create',
        component: CreateBook
    },
    {
        name: 'books.edit',
        path: '/books/edit/:id',
        component: EditBook
    },
    {
        name: 'authors.list',
        path: '/authors',
        component: AllAuthors
    },
    {
        name: 'authors.create',
        path: '/authors/create',
        component: CreateAuthor
    },
    {
        name: 'authors.edit',
        path: '/authors/edit/:id',
        component: EditAuthor
    }
];
