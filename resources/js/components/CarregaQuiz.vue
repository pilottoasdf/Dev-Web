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


  <div v-if="valor>0 && valor<=perguntas.length" class="quiz-wrapper">
    <div class="quiz-pergunta-larga">
  <div class="quiz-pergunta-conteudo">
    {{ perguntas[valor-1].pergunta }}
  </div>
</div>
    <h4 class="info">Escolha uma das alternativas:</h4>
    <div class="alternativas-grid">
      <button class="respostas red" :style="{
      backgroundColor:
        correta == 1 && etapa === 1
          ? 'green'
          : (correta!=1 && etapa === 1 
              ? 'silver' : 
              (selecionada === 1) ? 'lightblue' : '')
    }" @click="selecionaAlternativa(1)" type="button"><span>{{ perguntas[valor-1].alternativas[0] }}</span></button>

      <button class="respostas blue" :style="{
      backgroundColor:
        correta == 2 && etapa === 1
          ? 'green'
          : (correta!=2 && etapa === 1 
              ? 'silver' : 
              (selecionada === 2) ? 'lightblue' : '')
    }" @click="selecionaAlternativa(2)" type="button">{{ perguntas[valor-1].alternativas[1] }}</button>
      <button class="respostas pink" :style="{
      backgroundColor:
        correta == 3 && etapa === 1
          ? 'green'
          : (correta!=3 && etapa === 1 
              ? 'silver' : 
              (selecionada === 3) ? 'lightblue' : '')
    }" @click="selecionaAlternativa(3)" type="button">{{ perguntas[valor-1].alternativas[2] }}</button>
      <button class="respostas yellow" :style="{
      backgroundColor:
        correta == 4 && etapa === 1
          ? 'green'
          : (correta!=4 && etapa === 1 
              ? 'silver' : 
              (selecionada === 4) ? 'lightblue' : '')
    }" @click="selecionaAlternativa(4)" type="button">{{ perguntas[valor-1].alternativas[3] }}</button>
  </div>

    <br>
    <button class="finalizar-btn" @click="avancaPergunta" type="button">Avançar</button>
    
  </div>
  <div v-if="valor>perguntas.length" style="display:flex; flex-direction:column; align-items:center;">
   <div class="quiz-background">
    <div class="quiz-content">
    <h2>Você acertou: <span class="acertos">{{ acertos }}</span> / {{ perguntas.length }}</h2>
    </div>
    </div>
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
    }
  }
}
</script>
