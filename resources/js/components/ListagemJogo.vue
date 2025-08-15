<template>
  <div class="linha-topo d-flex justify-content-between align-items-center mb-3 px-3" style="position: relative; z-index: 10;">
    <h1 class="jogos-title m-0 text-center flex-grow-1">Jogos</h1>

    <!-- Dropdown container -->
    <div class="dropdown" style="position: relative;">
      <button class="btn btn-link p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="filtrar material-symbols-outlined">filter_alt</span>
      </button>

      <ul class="dropdown-menu dropdown-menu-end p-3" style="max-height: 400px; overflow-y: auto; z-index: 9999;">
        <!-- Disciplinas -->
        <div class="form-check" v-for="(disciplina, idx) in ['Português','Matemática','Física','Química','Biologia','História','Geografia','Filosofia','Sociologia','Inglês']" :key="'disc' + idx">
          <input @change="filtrarjogos" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" :id="'filtro' + idx" :value="disciplina">
          <label class="form-check-label" :for="'filtro' + idx">{{ disciplina }}</label>
        </div>

        <hr>

        <!-- Escolaridades -->
        <div class="form-check" v-for="(nivel, idx2) in ['Fundamental I','Fundamental II','Ensino Médio','Ensino Superior']" :key="'esc' + idx2">
          <input @change="filtrarjogos" class="form-check-input" type="radio" v-model="filtro_escolaridade" name="filtro_escolaridade" :id="'filtro' + (idx2 + 11)" :value="nivel">
          <label class="form-check-label" :for="'filtro' + (idx2 + 11)">{{ nivel }}</label>
        </div>

        <hr>

        <button @click="limparFiltro" type="button" class="btn btn-sm btn btn-outline-danger">Limpar</button>
      </ul>
    </div>
  </div>


<div id="carouselExample" class="carousel slide" v-if="Object.keys(vetor).length > 0">
  

  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carrossel-box-externo2">

        <!-- Área de rolagem -->
        <div class="diferenciado-box">
          <div v-for="(jogos, index) in vetor" :key="index">
            <a :href="'jogo/' + jogos['jogo']['id']">
              <!-- Com imagem -->
              <div v-if="jogos['jogo']['imagem'] != null" class="jogo" :style="{ backgroundImage: 'url(/storage/' + jogos['jogo']['imagem'] + ')', backgroundSize: 'cover', backgroundRepeat: 'no-repeat' }">
                <div class="overlay">
                  <div class="titulo">{{ jogos['jogo']['titulo'] }}</div>
                </div>
                <div class="detalhes">
                  <strong>Título:</strong>&nbsp;&nbsp;{{ jogos['jogo']['titulo'] }}<br>
                  <strong>Disciplina:</strong>&nbsp;&nbsp;{{ jogos['jogo']['disciplina'] }}<br>
                  <strong>Criador:</strong>&nbsp;&nbsp;{{ jogos['criador']['name'] }}<br>
                  <strong>Escolaridade:</strong>&nbsp;&nbsp;{{ jogos['jogo']['escolaridade_recomendada'] }}
                </div>
              </div>

              <!-- Sem imagem -->
              <div v-else class="quiz" style="background-color: yellow; display:flex; justify-content:center; align-items:center;">
                <h2 style="color:black;">{{ jogos['jogo']['titulo'] }}</h2>
                <div class="overlay">
                  <div class="titulo">{{ jogos['jogo']['titulo'] }}</div>
                </div>
                <div class="detalhes">
                  <strong>Título:</strong>&nbsp;&nbsp;{{ jogos['jogo']['titulo'] }}<br>
                  <strong>Disciplina:</strong>&nbsp;&nbsp;{{ jogos['jogo']['disciplina'] }}<br>
                  <strong>Criador:</strong>&nbsp;&nbsp;{{ jogos['criador']['name'] }}<br>
                  <strong>Escolaridade:</strong>&nbsp;&nbsp;{{ jogos['jogo']['escolaridade_recomendada'] }}
                </div>
              </div>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<!-- Se não houver jogos -->
<div class="nao-encontrado" v-else style="color: red;">
  Não foi possível encontrar nenhum jogo... 
</div>
</template>


<script>
export default {
  name: 'ListagemJogo',
  props: {
    json: Array,
  },
  data() {
    const vetor = this.json
    return {
      filtro_disciplina: null,
      filtro_escolaridade: null,
      todos_jogos: vetor,
      vetor: vetor,
    }
  },
  methods: {
    filtrarjogos() {
      let filtrados={}
      this.todos_jogos.forEach(jogos => {
        if(this.filtro_disciplina==null && this.filtro_escolaridade==null 
        || this.filtro_disciplina==jogos.jogo.disciplina && this.filtro_escolaridade==null 
        || this.filtro_disciplina==null && this.filtro_escolaridade==jogos.jogo.escolaridade_recomendada 
        || this.filtro_disciplina==jogos.jogo.disciplina && this.filtro_escolaridade==jogos.jogo.escolaridade_recomendada)
        {
          filtrados[jogos.jogo.id]=jogos
        }
      });
      this.vetor=filtrados
    },
    limparFiltro() {
      this.filtro_disciplina=null
      this.filtro_escolaridade=null
      this.vetor=this.todos_jogos
    },
  }
}
</script>
