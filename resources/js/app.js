import './bootstrap';
import { createApp } from 'vue';
import Menu from './components/Menu.vue';
import CriaPergunta from './components/CriaPergunta.vue';
import CarregaQuiz from './components/CarregaQuiz.vue';
import ListagemQuiz from './components/ListagemQuiz.vue';
import CriaQuedapergunta from './components/CriaQuedapergunta.vue';
import ListagemJogo from './components/ListagemJogo.vue';
import CarregaQuedaPergunta from './components/CarregaQuedaPergunta.vue';
import Ranking from './components/Ranking.vue';

const app = createApp({});
app.component('menu-component', Menu)
app.component('criapergunta-component', CriaPergunta)
app.component('carregaquiz-component', CarregaQuiz)
app.component('listagemquiz-component', ListagemQuiz)
app.component('criaquedapergunta-component', CriaQuedapergunta);
app.component('listagemjogo-component', ListagemJogo);
app.component('carregaquedapergunta-component', CarregaQuedaPergunta)
app.component('ranking-component', Ranking)
app.mount('#app');
