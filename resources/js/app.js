import './bootstrap';
import 'mdb-vue-ui-kit';
import { createApp } from 'vue';
import TodoList from './components/TodoList.vue';
import { routes } from './routes.js'; 
import { createRouter, createWebHistory } from 'vue-router'; 


const router = createRouter({ 
    history: createWebHistory(),
    routes: routes 
})

const app = createApp(TodoList) 
    .use(router) 
    .component('navigation', TodoList)
    .mount('#app'); 
