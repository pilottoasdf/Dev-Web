<template>
  <h1 class="queda">Queda de perguntas</h1>
  <form class="card-pergunta" action="/criar-jogo" method="POST" >
    <input type="hidden" name="_token" :value="csrfToken" />
    <div class="central" v-for="(pergunta, index) in perguntas" :key="index">
      <input class="arredondar pergunta" required :name="'pergunta_' + (index)" type="text" v-model="perguntas[index]['pergunta']" :placeholder="'Pergunta ' + (index + 1)"/>
      <br>
    <div  v-for="(resposta, numero) in perguntas[index].respostas" style="position: relative; width: 300px;margin-left:125px; margin-bottom: 10px;">
  <input class="arredondar" required
         :name="'resposta_' + (index) + (numero)"
         type="text"
         v-model="perguntas[index]['respostas'][numero]"
         :placeholder="'Resposta ' + (numero + 1)" />

  <button v-if="numero != 0"
          type="button"
          @click="apagarResposta(index, numero)"
          class="apagar-resposta-lixeira">
    <span class="material-symbols-outlined lixeira2">delete</span>
    Apagar Resposta
  </button>
</div>



      <button v-if="index!=0" type="button" @click="apagarPergunta(index)" class="apagar-pergunta">
        <span v-if="index!=0" class="material-symbols-outlined lixeira2">delete</span>
        Apagar Pergunta
      </button>
        
      <button type="button" @click="adicionarResposta(index)" class="color central btn">
        <span class="simbolo-criar material-symbols-outlined">add</span>
        <span class="texto-botao"> Adicionar resposta </span>
      </button>
    <br>
    </div>
    <br>
    <div class="botoes-container">
      <button type="button" @click="adicionarPergunta" class="color igual btn">
          <span class="simbolo-criar material-symbols-outlined">add</span>
          <span class="texto-botao"> Adicionar Pergunta </span>
        </button>
        <button type="button" @click="adicionarCincoPerguntas" class="color igual btn">
          <span class="simbolo-criar material-symbols-outlined">add</span>
           <span class="texto-botao"> Adicionar mais 5 Perguntas </span>
        </button>
      </div>

    <br>
    <input class="checkbox" type="checkbox" name="acento" id="acento">
    <label class="separar" for="acento">As respostas devem conter acentuação correta</label>
    <br><br>
    <input class="checkbox" type="checkbox" name="maiusculo" id="maiusculo">
    <label class="separar" for="maiusculo">As respostas devem conter letras maiúsculas e minúsculas corretamente</label>
    <br><br>
    <label for="tempo">Tempo em segundos até a palavra atingir o chão</label>
    <input type="number" name="tempo" id="tempo" placeholder="10" value="10" required>
    <input type="hidden" name="template" :value="template">
    <div class="botoes-do-quiz">
      <button type="submit" class="btn confirmar">Finalizar</button>
    </div>
  </form>

</template>

<script>
export default {
  name: 'CriaQuedaPergunta',
  props: {
    template: String
  },
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
      console.log(this.template)
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
