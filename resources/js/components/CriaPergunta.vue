<template>
  
  <form action="/criar-quiz" method="POST" >
    <input type="hidden" name="_token" :value="csrfToken" />
    <div v-for="(pergunta, index) in perguntas" :key="index" class="card-pergunta">
       <label class="pergunta-label">Pergunta:</label>
      <input required :name="'pergunta_' + (index)" type="text" v-model="perguntas[index]['pergunta']" :placeholder="'Pergunta ' + (index + 1)" class="input-pergunta"/>
      <br>
      <div class="grade-alternativas">
      <input required :name="'alternativa_1_' + (index)" type="text" v-model="perguntas[index]['alternativas'][0]" :placeholder="'Alternativa ' + 1"  class="alternativa red"/>
      <input required :name="'alternativa_2_' + (index)" type="text" v-model="perguntas[index]['alternativas'][1]" :placeholder="'Alternativa ' + 2"  class="alternativa blue"/>
      <input required :name="'alternativa_3_' + (index)" type="text" v-model="perguntas[index]['alternativas'][2]" :placeholder="'Alternativa ' + 3"  class="alternativa green"/>
      <input required :name="'alternativa_4_' + (index)" type="text" v-model="perguntas[index]['alternativas'][3]" :placeholder="'Alternativa ' + 4"  class="alternativa yellow"/>
      </div>
      <br>
      <label>Alternativa correta:</label>
      <select v-model="perguntas[index]['alternativa_correta']" :name="'alternativa_correta_' + (index)" id="alternativa_correta" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <br>
      <button type="button" @click="apagarPergunta(index)" class="apagar-pergunta">Apagar Pergunta</button>
      <br>
      <br>
    </div>
    

    <div class="botoes-do-quiz">
      <div class="botoes-container">
      <button type="button" @click="adicionarPergunta" class="adicionar-game btn">
          <span class="simbolo-criar material-symbols-outlined">add</span>
          <span class="texto-botao"> Adicionar Pergunta </span>
        </button>
        <button type="button" @click="adicionarCincoPerguntas" class="adicionar-game btn">
          <span class="simbolo-criar material-symbols-outlined">add</span>
           <span class="texto-botao"> Adicionar mais 5 Perguntas </span>
        </button>
      </div>

 <button type="submit" class="btn finalizar-btn">Finalizar</button>
</div>


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
    adicionarCincoPerguntas(){
      for(let i=0;i<5;i++){
        this.perguntas.push({
          'pergunta':'',
          'alternativas':['', '', '', ''],
          'alternativa_correta':'1',
        });
      }
    },
    apagarPergunta(index){
      this.perguntas.splice(index, 1)
    },
  }
}
</script>
