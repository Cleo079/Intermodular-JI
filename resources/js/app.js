import './bootstrap';

import * as bootstrap from 'bootstrap';

import { createApp } from 'vue';

import navBarVue from './components/NavBar.vue';
import FooterVue from './components/footerV.vue';

const app = createApp({});
app.component('navbar', navBarVue);
app.component('pie', FooterVue);
app.mount('#app');


// const pie = createApp({});
// pie.component('pie', FooterVue);
// pie.mount('#foot');
