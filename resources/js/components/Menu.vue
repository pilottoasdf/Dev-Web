<template>
 <nav class="navbar tamanho-menu navbar-dark ">
  <div class="container-fluid px-0 d-flex justify-content-between align-items-center" style="width: 100vw;">


   
    <div class="ms-3">
      <a v-if="perfil==false" class="navbar-brand" href="/inicio">
        <img class="logo" src="/public/logo.png" alt="logo do site" >
      </a>
    </div>


   
    <div class="position-absolute start-50 translate-middle-x d-flex gap-3">
      <a href="/inicio"><button class="btn botao-menu btn-light">Página Inicial</button></a>
      <a href="#"><button class="btn botao-menu btn-light">Games</button></a>
      <a href="/quizzes"><button class="btn botao-menu btn-light">Quizzes</button></a>
    </div>


<div v-if="perfil==false" class="me-3 dropdown d-flex align-items-center">
  <img class="usuario me-2" src="https://cdn-icons-png.flaticon.com/512/303/303593.png" alt="imagem do usuario" style="width: 40px; height: 40px; border-radius: 50%;">
 
  <button
    class="perfil-usuario dropdown-toggle"
    type="button"
    data-bs-toggle="dropdown"
    aria-expanded="false"
  >
    {{ userName }}
  </button>
 
  <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end p-3" style="min-width: 200px;">
    <!--<li><span class="jogando-como">Jogando como</span></li>-->
    <!--<li><strong>{{ userName }}</strong></li>-->
    <!--<li><small>{{ userEmail }}</small></li>-->
    <li><a href="/perfil" type="submit" class="dropdown-item btn btn-link text-start">Perfil</a></li>
    <li><a href="/meus-projetos" type="submit" class="dropdown-item btn btn-link text-start">Meus Projetos</a></li>
    <li><hr class="dropdown-divider"></li>
    <li>
      <a href="/logout" type="submit" class="perfil-cor dropdown-item btn btn-link text-start">Sair</a>
    </li>
  </ul>
</div>
  </div>
</nav>


</template>

<script>
export default {
  name: 'Menu',
  props: {
    userName: String,
    userEmail: String,
    logoutUrl: String,
    perfil: Boolean,
  }
}
</script>
