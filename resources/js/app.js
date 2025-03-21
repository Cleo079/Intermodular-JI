import './bootstrap';

import * as bootstrap from 'bootstrap';

import { createApp } from 'vue';

import pepeVue from './components/Pepe.vue';

const app = createApp({});

app.component('pepe', pepeVue);

app.mount('#app');
