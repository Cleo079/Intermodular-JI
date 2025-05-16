import './bootstrap';

import * as bootstrap from 'bootstrap';

import { createApp } from 'vue';

import navBarVue from './components/NavBar.vue';
import FooterVue from './components/footerV.vue';
import Registrarse from './components/Registrarse.vue';

import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import CreaEventos from './components/CreaEventos.vue';
import Entradas from './components/Entradas.vue';
import MostrarEntrada from './components/MostrarEntrada.vue';


gsap.registerPlugin(ScrollTrigger);

const app = createApp({});
app.component('navbar', navBarVue);
app.component('registro', Registrarse);
app.component('cevento', CreaEventos);
app.component('entradas', Entradas);
app.component('most-entrada', MostrarEntrada);
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
