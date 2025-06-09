<template>
  <form action="/criar-quiz" method="POST">
    <input type="hidden" name="_token" :value="csrfToken" />
    <div v-for="(pergunta, index) in perguntas" :key="index">
      <input required :name="'pergunta_' + (index)" type="text" v-model="perguntas[index]['pergunta']" :placeholder="'Pergunta ' + (index + 1)" />
      <br>
      <input required :name="'alternativa_1_' + (index)" type="text" v-model="perguntas[index]['alternativas'][0]" :placeholder="'Alternativa ' + 1" />
      <input required :name="'alternativa_2_' + (index)" type="text" v-model="perguntas[index]['alternativas'][1]" :placeholder="'Alternativa ' + 2" />
      <input required :name="'alternativa_3_' + (index)" type="text" v-model="perguntas[index]['alternativas'][2]" :placeholder="'Alternativa ' + 3" />
      <input required :name="'alternativa_4_' + (index)" type="text" v-model="perguntas[index]['alternativas'][3]" :placeholder="'Alternativa ' + 4" />
      <br>
      <label>Alternativa correta:</label>
      <select v-model="perguntas[index]['alternativa_correta']" :name="'alternativa_correta_' + (index)" id="alternativa_correta" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <br>
      <button type="button" @click="apagarPergunta(index)">Apagar Pergunta</button>
      <br>
      <br>
    </div>

    <button type="button" @click="adicionarPergunta">Adicionar Pergunta</button>
    <button type="submit">Finalizar</button>
  </form>
</template>

<script>
export default {
  name: 'CriaPergunta',
  data() {
    return {
      csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      perguntas: []
    }
  },
  methods: {
    adicionarPergunta() {
      this.perguntas.push({
        'pergunta':'',
        'alternativas':['', '', '', ''],
        'alternativa_correta':'1',
      });
    },
    apagarPergunta(index){
      this.perguntas.splice(index, 1)
    },
  }
}
</script>
