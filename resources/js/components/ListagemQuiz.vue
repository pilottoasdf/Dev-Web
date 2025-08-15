<template>
  <div class="linha-topo d-flex justify-content-between align-items-center mb-3 px-3" style="position: relative; z-index: 10;">
    <h1 class="quizzes-title m-0 text-center flex-grow-1">Quizzes</h1>

    <!-- Dropdown container -->
    <div class="dropdown" style="position: relative;">
      <button class="btn btn-link p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="filtrar material-symbols-outlined">filter_alt</span>
      </button>

      <ul class="dropdown-menu dropdown-menu-end p-3" style="max-height: 400px; overflow-y: auto; z-index: 9999;">
        <!-- Disciplinas -->
        <div class="form-check" v-for="(disciplina, idx) in ['Português','Matemática','Física','Química','Biologia','História','Geografia','Filosofia','Sociologia','Inglês']" :key="'disc' + idx">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" :id="'filtro' + idx" :value="disciplina">
          <label class="form-check-label" :for="'filtro' + idx">{{ disciplina }}</label>
        </div>

        <hr>

        <!-- Escolaridades -->
        <div class="form-check" v-for="(nivel, idx2) in ['Fundamental I','Fundamental II','Ensino Médio','Ensino Superior']" :key="'esc' + idx2">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_escolaridade" name="filtro_escolaridade" :id="'filtro' + (idx2 + 11)" :value="nivel">
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

        <div class=" diferenciado-box">
          <div v-for="(quizzes, index) in vetor" :key="index">
            <a :href="'quiz/' + quizzes['quiz']['id']">
              <!-- Com imagem -->
              <div v-if="quizzes['quiz']['imagem'] != null" class="quiz" :style="{ backgroundImage: 'url(/storage/' + quizzes['quiz']['imagem'] + ')', backgroundSize: 'cover', backgroundRepeat: 'no-repeat' }">
                <div class="overlay">
                  <div class="titulo">{{ quizzes['quiz']['titulo'] }}</div>
                </div>
                <div class="detalhes">
                  <strong>Título:</strong>&nbsp;&nbsp;{{ quizzes['quiz']['titulo'] }}<br>
                  <strong>Disciplina:</strong>&nbsp;&nbsp;{{ quizzes['quiz']['disciplina'] }}<br>
                  <strong>Criador:</strong>&nbsp;&nbsp;{{ quizzes['criador']['name'] }}<br>
                  <strong>Escolaridade:</strong>&nbsp;&nbsp;{{ quizzes['quiz']['escolaridade_recomendada'] }}
                </div>
              </div>

              <!-- Sem imagem -->
              <div v-else class="quiz" style="background-color: yellow; display:flex; justify-content:center; align-items:center;">
                <h2 style="color:black;">{{ quizzes['quiz']['titulo'] }}</h2>
                <div class="overlay">
                  <div class="titulo">{{ quizzes['quiz']['titulo'] }}</div>
                </div>
                <div class="detalhes">
                  <strong>Título:</strong>&nbsp;&nbsp;{{ quizzes['quiz']['titulo'] }}<br>
                  <strong>Disciplina:</strong>&nbsp;&nbsp;{{ quizzes['quiz']['disciplina'] }}<br>
                  <strong>Criador:</strong>&nbsp;&nbsp;{{ quizzes['criador']['name'] }}<br>
                  <strong>Escolaridade:</strong>&nbsp;&nbsp;{{ quizzes['quiz']['escolaridade_recomendada'] }}
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Se não houver quizzes -->
<div class="nao-encontrado" v-else style="color: red;">
  Não foi possível encontrar nenhum quiz... 
</div>
</template>


<script>
export default {
  name: 'ListagemQuiz',
  props: {
    json: String,
  },
  data() {
    const vetor = JSON.parse(this.json)
    return {
      filtro_disciplina: null,
      filtro_escolaridade: null,
      todos_quizzes: vetor,
      vetor: vetor,
    }
  },
  methods: {
    filtrarQuizzes() {
      let filtrados={}
      this.todos_quizzes.forEach(quizzes => {
        if(this.filtro_disciplina==null && this.filtro_escolaridade==null 
        || this.filtro_disciplina==quizzes.quiz.disciplina && this.filtro_escolaridade==null 
        || this.filtro_disciplina==null && this.filtro_escolaridade==quizzes.quiz.escolaridade_recomendada 
        || this.filtro_disciplina==quizzes.quiz.disciplina && this.filtro_escolaridade==quizzes.quiz.escolaridade_recomendada)
        {
          filtrados[quizzes.quiz.id]=quizzes
        }
      });
      this.vetor=filtrados
    },
    limparFiltro() {
      this.filtro_disciplina=null
      this.filtro_escolaridade=null
      this.vetor=this.todos_quizzes
    },
  }
}
</script>
