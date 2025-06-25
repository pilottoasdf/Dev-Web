<template>

  <div class="linha-topo d-flex justify-content-between align-items-center mb-3 px-3">
    <h1 class="quizzes-title m-0 text-center flex-grow-1">Quizzes</h1>
    <div class="dropdown">
      <button class="btn btn-link p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="filtrar material-symbols-outlined">filter_alt</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end p-3">

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro1" value="Português">
          <label class="form-check-label" for="filtro1">Português</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro2" value="Matemática">
          <label class="form-check-label" for="filtro2">Matemática</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro3" value="Física">
          <label class="form-check-label" for="filtro3">Física</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro4" value="Química">
          <label class="form-check-label" for="filtro4">Química</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro5" value="Biologia">
          <label class="form-check-label" for="filtro5">Biologia</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro6" value="História">
          <label class="form-check-label" for="filtro6">História</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro7" value="Geografia">
          <label class="form-check-label" for="filtro7">Geografia</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro8" value="Filosofia">
          <label class="form-check-label" for="filtro8">Filosofia</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro9" value="Sociologia">
          <label class="form-check-label" for="filtro9">Sociologia</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_disciplina" name="filtro_disciplina" id="filtro10" value="Inglês">
          <label class="form-check-label" for="filtro10">Inglês</label>
        </div>

        <hr>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_escolaridade" name="filtro_escolaridade" id="filtro11" value="Fundamental I">
          <label class="form-check-label" for="filtro11">Fundamental I</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_escolaridade" name="filtro_escolaridade" id="filtro12" value="Fundamental II">
          <label class="form-check-label" for="filtro12">Fundamental II</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_escolaridade" name="filtro_escolaridade" id="filtro13" value="Ensino Médio">
          <label class="form-check-label" for="filtro13">Ensino Médio</label>
        </div>

        <div class="form-check">
          <input @change="filtrarQuizzes" class="form-check-input" type="radio" v-model="filtro_escolaridade" name="filtro_escolaridade" id="filtro14" value="Ensino Superior">
          <label class="form-check-label" for="filtro14">Ensino Superior</label>
        </div>
        
        <hr>

        <button @click="limparFiltro" type="button">Limpar</button>
      </ul>
    </div>
  </div>

  <div class="diferente-quiz box-quiz" v-if="Object.keys(vetor).length>0" v-for="(quizzes, index) in vetor" :key="index">
    <a :href="'quiz/' + quizzes['quiz']['id']">
      <div class="quiz" :style="{ backgroundImage: 'url(/storage/' + quizzes['quiz']['imagem'] + ')' }">
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

  <div v-else style="color:red;">
    Não foi possível encontrar nenhum quiz 
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
