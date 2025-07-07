import './bootstrap';
import { createApp } from 'vue';
import Menu from './components/Menu.vue';
import CriaPergunta from './components/CriaPergunta.vue';
import CarregaQuiz from './components/CarregaQuiz.vue';
import ListagemQuiz from './components/ListagemQuiz.vue';
import CriaJogo from './components/CriaJogo.vue';

const app = createApp({});
app.component('menu-component', Menu)
app.component('criapergunta-component', CriaPergunta)
app.component('carregaquiz-component', CarregaQuiz)
app.component('listagemquiz-component', ListagemQuiz)
app.component('criajogo-component', CriaJogo);
app.mount('#app');
