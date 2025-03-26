import './bootstrap';

import * as bootstrap from 'bootstrap';

import { createApp } from 'vue';

import navBarVue from './components/NavBar.vue';
import FooterVue from './components/footerV.vue';

const app = createApp({});
app.component('navbar', navBarVue);
app.component('pie', FooterVue);
app.mount('#app');

gsap.registerPlugin(ScrollTrigger);

        gsap.utils.toArray(".info, .guests, .tickets").forEach(section => {
            gsap.to(section, {
                opacity: 1,
                y: 0,
                duration: 1.5,
                scrollTrigger: {
                    trigger: section,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            });
        });

// const pie = createApp({});
// pie.component('pie', FooterVue);
// pie.mount('#foot');
