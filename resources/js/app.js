import './bootstrap';

import * as bootstrap from 'bootstrap';

import { createApp } from 'vue';

import pepeVue from './components/Pepe.vue';
import footerVue from './components/footerV.vue';

const app = createApp({});

app.component('pepe', pepeVue);
app.component('footerV', footerVue);

app.mount('#app');
