import './bootstrap';
//import { createApp } from 'vue';
import { createApp } from 'vue/dist/vue.esm-bundler';

const app = createApp({});

import CreateCategoryComponent from './components/category/CreateCategoryComponent.vue';

app.component('create-category-component', CreateCategoryComponent);


app.mount('#app');