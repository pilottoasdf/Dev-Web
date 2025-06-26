<template>

<div v-if="valor == 0" class="quiz-container">
  <div class="quiz-background">
    <div class="quiz-content">
      <h1>{{ quiz.titulo }}</h1>
      <p>{{ quiz.descricao }}</p>
      <button class="botao-iniciar" type="button" @click="iniciarQuiz">Iniciar Quiz</button>
    </div>
  </div>
</div>


  <div v-if="valor>0 && valor<=perguntas.length" style="display:flex; flex-direction:column; align-items:center;">
    <h2>{{ perguntas[valor-1].pergunta }}</h2>
    <div>
      <button :style="{
      backgroundColor:
        correta == 1 && etapa === 1
          ? 'green'
          : (correta!=1 && etapa === 1 
              ? 'silver' : 
              (selecionada === 1) ? 'lightblue' : '')
    }" @click="selecionaAlternativa(1)" type="button">{{ perguntas[valor-1].alternativas[0] }}</button>

      <button :style="{
      backgroundColor:
        correta == 2 && etapa === 1
          ? 'green'
          : (correta!=2 && etapa === 1 
              ? 'silver' : 
              (selecionada === 2) ? 'lightblue' : '')
    }" @click="selecionaAlternativa(2)" type="button">{{ perguntas[valor-1].alternativas[1] }}</button>
      <button :style="{
      backgroundColor:
        correta == 3 && etapa === 1
          ? 'green'
          : (correta!=3 && etapa === 1 
              ? 'silver' : 
              (selecionada === 3) ? 'lightblue' : '')
    }" @click="selecionaAlternativa(3)" type="button">{{ perguntas[valor-1].alternativas[2] }}</button>
      <button :style="{
      backgroundColor:
        correta == 4 && etapa === 1
          ? 'green'
          : (correta!=4 && etapa === 1 
              ? 'silver' : 
              (selecionada === 4) ? 'lightblue' : '')
    }" @click="selecionaAlternativa(4)" type="button">{{ perguntas[valor-1].alternativas[3] }}</button>
  </div>

    <br>
    <button @click="avancaPergunta" type="button">Avançar</button>
    
  </div>

</template>

<script>
export default {
  name: 'CarregaQuiz',
  props: {
    json: {
      type: String,
      required: true
    }
  },
  data() {
    const quizObj = JSON.parse(this.json)
    return {
      quiz: quizObj,
      perguntas: JSON.parse(quizObj.perguntas),
      valor: 0,

      correta: 0,
      selecionada: 0,

      etapa: 0,
      
      acertos: 0,
    }
  },
  methods:{
    iniciarQuiz(){
      this.valor = 1
    },
    selecionaAlternativa(numeroAlternativa){
      if(this.etapa===0){
        this.correta = this.perguntas[(this.valor)-1].alternativa_correta
        this.selecionada = numeroAlternativa
      }
    },
    avancaPergunta(){
      if(this.selecionada!=0){
        if(this.etapa===0){
          this.etapa = 1
        }else{
          if(this.correta==this.selecionada){
            this.acertos++
          }
          this.valor++
          this.selecionada = 0
          this.etapa = 0
        }
      }
      if(this.valor>this.perguntas.length){
        function redirectPost(url, data = {}) {
          const form = document.createElement('form');
          form.method = 'POST';
          form.action = url;

          const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
          if (csrfToken) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = '_token';
            input.value = csrfToken;
            form.appendChild(input);
          }

          for (const key in data) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = data[key];
            form.appendChild(input);
          }

          document.body.appendChild(form);
          
          form.submit();
        }

        redirectPost('/progresso/create/', {
          id_quiz: this.quiz.id,
          acertos: this.acertos,
          perguntas: this.perguntas.length,
        })

      }
    }
  }
}
</script>
