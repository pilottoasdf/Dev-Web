<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Início</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  @vite(['resources/css/inicio.css', 'resources/js/inicio.js', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
</head>
<body>

<div id="app">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">

        <!-- Aqui o seu menu-component fixo, com os botões -->
        <menu-component 
        
        ></menu-component>
        <ul><div class="bolinha"></div></ul>
        <!-- Dropdown só com usuário e logout -->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <button 
              class="btn btn-dark dropdown-toggle" 
              data-bs-toggle="dropdown" 
              aria-expanded="false"
              type="button"
            >
              Perfil
            </button>
            <ul class="dropdown-menu dropdown-menu-dark p-3" style="min-width: 200px;">
              <li><span class="jogando-como">Jogando como</span></li>
              <li><strong>{{ auth()->user()->name }}</strong></li>
              <li><small>{{ auth()->user()->email }}</small></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item btn btn-link text-start">Sair</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>
</div>



  <div class="banner" id="banner">
    <img id="banner-img" src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Banner" />
    <div class="texto" id="banner-texto">
      <p class="titulo-principal">GameMind</p>
      <button id="btn-comecar">Comece a jogar agora!</button>
    </div>
    <div class="arrow arrow-left" id="prev">&#10094;</div>
    <div class="arrow arrow-right" id="next">&#10095;</div>
  </div>

  <div class="recomendados">
    Recomendados para você:
  </div>

 <div class="cards-wrapper">
  <div class="cards-row d-flex flex-row flex-nowrap gap-3 px-3">
    <!-- Card 1 -->
    <div class="card d-flex flex-row overflow-hidden" style="width: 350px; height: 140px;">
      <div class="imagem_card">
        <img src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Imagem" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <div class="p-3 texto-card">
        <h5 class="card-title">Jogo 1</h5>
        <p class="card-text">Texto do jogo 1</p>
        <p class="card-text"><small class="text-muted">Matemática – Análise Combinatória</small></p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="card d-flex flex-row overflow-hidden" style="width: 350px; height: 140px;">
      <div class="imagem_card">
        <img src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Imagem" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <div class="p-3 texto-card">
        <h5 class="card-title">Quiz 1</h5>
        <p class="card-text">Texto do jogo 1</p>
        <p class="card-text"><small class="text-muted">História – Pré-História</small></p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="card d-flex flex-row overflow-hidden" style="width: 350px; height: 140px;">
      <div class="imagem_card">
        <img src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Imagem" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <div class="p-3 texto-card">
        <h5 class="card-title">Quiz 1</h5>
        <p class="card-text">Texto do jogo 2</p>
        <p class="card-text"><small class="text-muted">História – Antiguidade Clássica</small></p>
      </div>
    </div>
  </div>

  <!-- Card adicionar fica aqui, abaixo -->
  <div class="card adicionar" style="width: 1050px; height: 60px; margin-top: 15px;">Ver mais...</div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
