<template>
  <div class="form_container">
  <div class="tabs">
    <div @click="dadosQuiz" :class="'tab ' + active_quiz">Quiz</div>
    <div @click="dadosJogo" :class="'tab ' + active_jogo">Jogos</div>
  </div>

  <div class="form_ranking">
    <div class="scroll-area">
      <div class="separar">
        <span>Usuários</span>
        <span>Pontos</span>
        <span>Troféus</span>
      </div>

      <div v-for="(vetor, index) in dados" :key="index">

        <div class="ranking-row"><span>{{ index+1 }}º {{ vetor.usuario?.name || 'Sem nome' }} </span><span>Pontos: {{ Number(vetor.progresso.media_pontos).toFixed(2) }}</span><span>{{ vetor.progresso.total }}X 🏆</span></div><hr>

      </div>
      
    </div>

    <a href="perfil" style="text-decoration: none;"><button class="ranking-voltar">Voltar</button></a>
  </div>
</div>
</template>


<script>
export default {
  name: 'Ranking',
  props: {
    dados_jogo: String,
    dados_quiz: String,
  },
  data() {
    const jogo = JSON.parse(this.dados_jogo)
    const quiz = JSON.parse(this.dados_quiz)
    return {
      dados:quiz,
      vetor_quiz:quiz,
      vetor_jogo:jogo,
      active_quiz: 'active',
      active_jogo: '',
    }
  },
  methods: {
    dadosJogo(){
        this.dados=this.vetor_jogo
        this.active_jogo='active'
        this.active_quiz=''
    },
    dadosQuiz(){
        this.dados=this.vetor_quiz
        this.active_quiz='active'
        this.active_jogo=''
    }
  }
}
</script>
