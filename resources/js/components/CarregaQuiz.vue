<template>
  <div v-if="valor==0" style="display:flex; flex-direction:column; align-items:center;">
    <h1>{{ quiz.titulo }}</h1>
    <p>{{ quiz.descricao }}</p>
    <button type="button" @click="iniciarQuiz">Iniciar Quiz</button>
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
  <div v-if="valor>perguntas.length" style="display:flex; flex-direction:column; align-items:center;">
    <h2>Você acertou {{ acertos }} questões de {{ perguntas.length }}</h2>
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
