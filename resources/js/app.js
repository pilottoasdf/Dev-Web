import './bootstrap';
import { createApp } from 'vue';
import Menu from './components/Menu.vue';
import CriaPergunta from './components/CriaPergunta.vue';

const app = createApp({});
app.component('menu-component', Menu)
app.component('criapergunta-component', CriaPergunta)
app.mount('#app');
