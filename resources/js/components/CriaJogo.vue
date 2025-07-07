<template>
  
  <form action="/criar-quiz" method="POST" >
    <input type="hidden" name="_token" :value="csrfToken" />
    

    <div class="botoes-do-quiz">
      <div class="botoes-container">
      <button type="button" @click="voltar" class="adicionar-game btn">
          <span class="texto-botao"> Voltar </span>
        </button>
      </div>

 <button type="submit" class="btn finalizar-btn">Finalizar</button>
</div>


  </form>
</template>

<script>
export default {
  name: 'CriaJogo',
  data() {
    return {
      csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      etapa: 1,
    }
  },
  methods: {
    voltar(){
      this.etapa==1
    },
  }
}
</script>
