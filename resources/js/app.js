import './bootstrap';
import '../css/app.css'

import {createApp} from 'vue/dist/vue.esm-bundler';

import App from './Components/App.vue';

const app = createApp({});
app.component('App', App);
app.mount('#app');
