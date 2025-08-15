import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/cadastro3.css', 'resources/css/carregarQuiz.css', 'resources/css/editar.css', 'resources/css/form.css', 'resources/css/info.css', 'resources/css/inicio.css', 'resources/css/login2.css', 'resources/css/perfil.css', 'resources/css/preferencia.css', 'resources/css/quizzes.css', 'resources/css/ranking.css', 'resources/js/app.js', 'resources/js/components/CarregaQuiz.vue', 'resources/js/components/CriaPergunta.vue', 'resources/js/components/ListagemQuiz.vue', 'resources/js/components/Menu.vue', 'resources/js/inicio.js'],
            refresh: true,
        }),
        vue(), 
        tailwindcss(),
    ],
});
