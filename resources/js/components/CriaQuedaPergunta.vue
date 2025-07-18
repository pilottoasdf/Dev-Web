<template>
  <h1>Queda de perguntas</h1>
  <form action="/criar-jogo" method="POST" class="card-pergunta" >
    <input type="hidden" name="_token" :value="csrfToken" />
    <div v-for="(pergunta, index) in perguntas" :key="index">
      <input required :name="'pergunta_' + (index)" type="text" v-model="perguntas[index]['pergunta']" :placeholder="'Pergunta ' + (index + 1)"/>
      <br>
      <div v-for="(resposta, numero) in perguntas[index].respostas">
        <input required :name="'resposta_' + (index) + (numero)" type="text" v-model="perguntas[index]['respostas'][numero]" :placeholder="'Resposta ' + (numero + 1)" />
        <button v-if="numero!=0" type="button" @click="apagarResposta(index, numero)" class="apagar-pergunta">
        <span v-if="numero!=0" class="material-symbols-outlined lixeira2">delete</span>
        Apagar Resposta
      </button>
      </div>
        <br>
      <button type="button" @click="adicionarResposta(index)" class="color btn">
        <span class="simbolo-criar material-symbols-outlined">add</span>
        <span class="texto-botao"> Adicionar resposta </span>
      </button>
      <br>
      <button v-if="index!=0" type="button" @click="apagarPergunta(index)" class="apagar-pergunta">
        <span v-if="index!=0" class="material-symbols-outlined lixeira2">delete</span>
        Apagar Pergunta
      </button>
      <br>
    </div>

    <input type="checkbox" name="acento" id="acento" v-model="acento">
    <label for="acento">As respostas devem conter acentuação correta</label>
    <br>
    <input type="checkbox" name="maiusculo" id="maiusculo" v-model="maiusculo">
    <label for="maiusculo">   As respostas deve, conter letras maiúsculas e minúsculas corretamente</label>
<br><br>
    <div class="botoes-do-quiz">
      <div class="botoes-container">
      <button type="button" @click="adicionarPergunta" class="color btn">
          <span class="simbolo-criar material-symbols-outlined">add</span>
          <span class="texto-botao"> Adicionar Pergunta </span>
        </button>
        <button type="button" @click="adicionarCincoPerguntas" class="color btn">
          <span class="simbolo-criar material-symbols-outlined">add</span>
           <span class="texto-botao"> Adicionar mais 5 Perguntas </span>
        </button>
      </div>
      <button type="submit" class="btn ordenar finalizar-btn">Finalizar</button>
    </div>
  </form>

</template>

<script>
export default {
  name: 'CriaQuedaPergunta',
  data() {
    return {
      csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      perguntas: [
        {
          'pergunta':'',
          'respostas':[''],
        }
      ],
      acento: false,
      maiusculo: false,
    }
  },
  methods: {
    adicionarResposta(index){
      this.perguntas[index].respostas.push(
        ''
      );
    },
    apagarResposta(index, numero){
      this.perguntas[index].respostas.splice(numero, 1)
    },

    adicionarPergunta() {
      this.perguntas.push({
        'pergunta':'',
        'respostas':[''],
      });
    },
    adicionarCincoPerguntas(){
      for(let i=0;i<5;i++){
        this.perguntas.push({
          'pergunta':'',
          'respostas':[''],
        });
      }
    },
    apagarPergunta(index){
      this.perguntas.splice(index, 1)
    },
  }
}
</script>
