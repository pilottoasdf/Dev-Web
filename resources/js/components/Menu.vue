<template>
  <div class="perfil">
    
    <div class="info">
      {{ userName }}
      <br>
      {{ userEmail }}
      <br>
      
    </div>
  </div>

  <div class="menu-superior">
    <a href="/inicio"><button>Página Inicial</button></a>
    <button>Games</button>
    <a href="/quizzes"><button>Quizzes</button></a>
  </div>
</template>

<script>
export default {
  name: 'Menu',
  props: {
    userName: String,
    userEmail: String,
    logoutUrl: String,
  }
}
</script>
