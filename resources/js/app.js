import './bootstrap';

import * as bootstrap from 'bootstrap';

import { createApp } from 'vue';

import pepeVue from './components/Pepe.vue';
import FooterVue from './components/footerV.vue';

const app = createApp({});
app.component('pepe', pepeVue);
app.component('pie', FooterVue);
app.mount('#app');


// const pie = createApp({});
// pie.component('pie', FooterVue);
// pie.mount('#foot');
