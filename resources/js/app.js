import './bootstrap'; //import bootstrap


//import { createApp } from 'vue';
import { createApp } from 'vue';

const app = createApp({});

import DashboardComponent from './components/DashboardComponent.vue';

app.component('dashboard-component', DashboardComponent);

//Register Component
import ViewPostComponent from './components/ViewPostComponent.vue';
import CreatePostComponent from './components/CreatePostComponent.vue';

//Use Component
app.component('view-post-component', ViewPostComponent);
app.component('create-post-component', CreatePostComponent);

import CreateCategoryComponent from './components/category/CreateCategoryComponent.vue';

app.component('create-category-component', CreateCategoryComponent);


app.mount('#app');