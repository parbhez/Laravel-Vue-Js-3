import './bootstrap'; //import bootstrap


//import { createApp } from 'vue';
import { createApp } from 'vue/dist/vue.esm-bundler';


const app = createApp({});

import DashboardComponent from './components/DashboardComponent.vue';

app.component('dashboard-component', DashboardComponent);


app.mount('#app');