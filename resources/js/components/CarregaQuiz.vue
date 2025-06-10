<template>
  <div v-if="valor==0">
    <h1>{{ quiz.titulo }}</h1>
    <p>{{ quiz.descricao }}</p>
    <button type="button" @click="iniciarQuiz">Iniciar Quiz</button>
  </div>

  <div v-if="valor>0">
    <h2>{{ perguntas[valor-1].pergunta }}</h2>
    <label for="alternativa_1_"></label>
    <input type="radio" :v-name="'alternativa_1_' + (valor-1)">
    <br>
    <label for="alternativa_1_"></label>
    <input type="radio" :v-name="'alternativa_2_' + (valor-1)">
    <br>
    <label for="alternativa_1_"></label>
    <input type="radio" :v-name="'alternativa_3_' + (valor-1)">
    <br>
    <label for="alternativa_1_"></label>
    <input type="radio" :v-name="'alternativa_4_' + (valor-1)">
    <br>
    
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
      valor: 0
    }
  },
  methods:{
    iniciarQuiz(){
      this.valor = 1
    },
  }
}
</script>
