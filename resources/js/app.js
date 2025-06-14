import './bootstrap';
import { createApp } from 'vue';
import Menu from './components/Menu.vue';
import CriaPergunta from './components/CriaPergunta.vue';
import CarregaQuiz from './components/CarregaQuiz.vue';

const app = createApp({});
app.component('menu-component', Menu)
app.component('criapergunta-component', CriaPergunta)
app.component('carregaquiz-component', CarregaQuiz)
app.mount('#app');
