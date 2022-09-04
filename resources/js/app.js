import './bootstrap';
//import { createApp } from 'vue';
import { createApp } from 'vue/dist/vue.esm-bundler';


const app = createApp({});

import DashboardComponent from './components/DashboardComponent.vue';

app.component('dashboard-component', DashboardComponent);

import ViewPostComponent from './components/ViewPostComponent.vue';
import CreatePostComponent from './components/CreatePostComponent.vue';

app.component('view-post-component', ViewPostComponent);
app.component('create-post-component', CreatePostComponent);

app.mount('#app');