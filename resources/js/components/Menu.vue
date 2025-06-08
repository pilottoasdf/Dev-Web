<template>
  <div class="perfil">
    <div class="bolinha"></div>
    <div class="info">
      <span class="jogando-como">Jogando como</span>
      {{ userName }}
      <br>
      {{ userEmail }}
      <br>
      <a href="/logout">Clica aqui pra deslogar</a>
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
