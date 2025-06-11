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
<!--inicio do menu-->
<div id="app">
 <nav class="navbar tamanho-menu navbar-dark ">
  <div class="container-fluid px-0 d-flex justify-content-between align-items-center" style="width: 100vw;">

    
    <div class="ms-3">
      <a class="navbar-brand" href="#">
        <img class="logo" src="{{ asset('logo.png') }}" alt="logo do site" >
      </a>
    </div>

    
    <div class="position-absolute start-50 translate-middle-x d-flex gap-3">
      <a href="/inicio"><button class="btn botao-menu btn-light">Página Inicial</button></a>
      <a href="#"><button class="btn botao-menu btn-light">Games</button></a>
      <a href="/quizzes"><button class="btn botao-menu btn-light">Quizzes</button></a>
    </div>

<div class="me-3 dropdown d-flex align-items-center">
  <img class="usuario me-2" src="https://cdn-icons-png.flaticon.com/512/303/303593.png" alt="imagem do usuario" style="width: 40px; height: 40px; border-radius: 50%;">
  
  <button 
    class="btn btn-dark dropdown-toggle" 
    type="button" 
    data-bs-toggle="dropdown" 
    aria-expanded="false"
  >
    Perfil
  </button>
  
  <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end p-3" style="min-width: 200px;">
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
</div>



  </div>
</nav>

</div>
<!--fim do menu-->


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

 <div class="container my-4" style="max-width: 1140px;">
  <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
    <div class="d-flex justify-content-center align-items-center">

      <!-- Botão-->
      <button class="btn botao-carrossel me-2" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>

      <!-- Slides -->
      <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
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
                  <h5 class="card-title">Quiz 2</h5>
                  <p class="card-text">Texto do jogo 2</p>
                  <p class="card-text"><small class="text-muted">História – Antiguidade Clássica</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="cards-wrapper">
            <div class="cards-row d-flex flex-row flex-nowrap gap-3 px-3">
              <!-- Card 4 -->
              <div class="card d-flex flex-row overflow-hidden" style="width: 350px; height: 140px;">
                <div class="imagem_card">
                  <img src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Imagem" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="p-3 texto-card">
                  <h5 class="card-title">Quiz 3</h5>
                  <p class="card-text">Outro exemplo</p>
                  <p class="card-text"><small class="text-muted">Ciências – Sistema Solar</small></p>
                </div>
              </div>

              <!-- Card 5 -->
              <div class="card d-flex flex-row overflow-hidden" style="width: 350px; height: 140px;">
                <div class="imagem_card">
                  <img src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Imagem" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="p-3 texto-card">
                  <h5 class="card-title">Quiz 4</h5>
                  <p class="card-text">Outro exemplo</p>
                  <p class="card-text"><small class="text-muted">Ciências – Sistema Solar</small></p>
                </div>
              </div>

              <!-- Card 6 -->
              <div class="card d-flex flex-row overflow-hidden" style="width: 350px; height: 140px;">
                <div class="imagem_card">
                  <img src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Imagem" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="p-3 texto-card">
                  <h5 class="card-title">Quiz 5</h5>
                  <p class="card-text">Outro exemplo</p>
                  <p class="card-text"><small class="text-muted">Ciências – Sistema Solar</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- Fim do carrossel-->

      <!-- Botão-->
      <button class="btn botao-carrossel ms-2" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
      </button>
    </div> 
  </div>
</div>



  <!-- Card adicionar-->
 <div class="card adicionar mx-auto" style="max-width: 100%; width: 1050px; height: 40px;">Ver mais...</div>

</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
