<template>

<div v-if="valor == 0" class="quiz-container">
  <div class="quiz-background">
    <div class="quiz-content">
      <h1>{{ jogo.titulo }}</h1>
      <p>{{ jogo.descricao }}</p>
      <button class="botao-iniciar" type="button" @click="iniciarJogo">Iniciar Jogo</button>
    </div>
  </div>
</div>

<div style="border: solid black 20px; width:100%; height:80vh; display: flex; flex-direction: column; align-items: center; justify-content: flex-end;" v-if="valor == 1">
  <div  class="objeto-jogo" v-if="Object.keys(this.codigo).filter(k => !isNaN(k)).length>index" :style="'top:' + y + 'px; position:relative; right:' + x + 'px; border:solid black 2px;'">{{ codigo[index].pergunta }}</div>
  <div class="acertos2">{{ acertos }}</div>
  <div>
    <input class="queda-resposta" @input="verificarResposta" ref="inputResposta" :name="'respondendo'" type="text" v-model="respondendo" :placeholder="'Digite sua resposta'" />
  </div>
</div>
  


</template>

<script>
export default {
  name: 'CarregaQuedaPergunta',
  props: {
    json: {
      type: String,
      required: true
    }
  },
  data() {
    const jogoObj = JSON.parse(this.json)
    return {
      jogo: jogoObj,
      codigo: JSON.parse(jogoObj.codigo),
      valor: 0,
      respondendo: '',
      index: 0,
      y: -375,
      x: 0,
      intervalo: '',
      acertos: 0,
    }
  },

  mounted() {
    window.addEventListener('keydown', this.focarInput);
  },

  methods:{
    quedaPergunta(){
      if (this.intervalo) {
        clearInterval(this.intervalo)
      }
      this.y=-375
      this.x=Math.floor(Math.random() * 310) - 150
      let distancia = (425/Number((this.codigo.tempo)*100))
      this.intervalo = setInterval(() => {
        this.y += distancia
        if (this.y>25){
          this.avancarPergunta()
        }
      }, this.codigo.tempo)
    },

    iniciarJogo(){
      this.valor = 1
      this.quedaPergunta()
    },

    avancarPergunta(){
      this.index++
      const totalPerguntas = Object.keys(this.codigo).filter(k => !isNaN(k)).length
      if(this.index<totalPerguntas){
        this.quedaPergunta()
      }else{
        if (this.intervalo) {
          clearInterval(this.intervalo)
        }
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
          id_jogo: this.jogo.id,
          acertos: this.acertos,
          perguntas: totalPerguntas,
        })

      }
    },

    verificarResposta(){
      this.codigo[this.index].respostas.forEach(resposta => {
        let resposta_formatada = resposta
        let respondendo_formatado = this.respondendo

        if(this.codigo.acento==null){
          resposta_formatada = resposta_formatada.normalize("NFD").replace(/[\u0300-\u036f]/g, "")
          respondendo_formatado = respondendo_formatado.normalize("NFD").replace(/[\u0300-\u036f]/g, "")
        }
        if(this.codigo.maiusculo==null){
          resposta_formatada = resposta_formatada.toLowerCase()
          respondendo_formatado = respondendo_formatado.toLowerCase()
        }

        if(resposta_formatada==respondendo_formatado){
          this.acertos++
          this.respondendo=''
          this.avancarPergunta()
        }
      });
    },

    focarInput() {
      this.$refs.inputResposta.focus();
    }
    
  }
}
</script>
