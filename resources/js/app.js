import './bootstrap';
import { createApp } from 'vue';
import Menu from './components/Menu.vue';

const app = createApp({});
app.component('menu-component', Menu)
app.mount('#app');
