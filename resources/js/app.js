import './bootstrap';
import { createApp } from 'vue';
import Menu from './components/Menu.vue';
import CriaPergunta from './components/CriaPergunta.vue';
import CarregaQuiz from './components/CarregaQuiz.vue';
import ListagemQuiz from './components/ListagemQuiz.vue';
import CriaQuedapergunta from './components/CriaQuedapergunta.vue';
import ListagemJogo from './components/ListagemJogo.vue';

const app = createApp({});
app.component('menu-component', Menu)
app.component('criapergunta-component', CriaPergunta)
app.component('carregaquiz-component', CarregaQuiz)
app.component('listagemquiz-component', ListagemQuiz)
app.component('criaquedapergunta-component', CriaQuedapergunta);
app.component('listagemjogo-component', ListagemJogo);
app.mount('#app');
