<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Início</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
  @vite(['resources/css/inicio.css','resources/css/quizzes.css', 'resources/js/inicio.js', 'resources/js/app.js'])
</head>
<body>

  <!-- Início do Menu -->
  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      logout-url="{{ route('logout') }}">
    </menu-component>
  </div>
  <!-- Fim do Menu -->

  <!-- Banner -->
  <div class="banner" id="banner">
    <img id="banner-img" src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Banner" />
    <div class="texto" id="banner-texto">
      <p class="titulo-principal">GameMind</p>
      <button id="btn-comecar">Comece a jogar agora!</button>
    </div>
    <div class="arrow arrow-left" id="prev">&#10094;</div>
    <div class="arrow arrow-right" id="next">&#10095;</div>
  </div>

  <!-- Recomendados -->
  <div class="recomendados">
    Recomendados para você:
  </div>

  <!-- Lista de Quizzes -->
  <div class="container my-4" style="max-width: 1140px;">
    <div class="d-flex justify-content-center align-items-center">

      <!-- Botão Anterior -->
      <button class="btn botao-carrossel me-2" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>

      <!-- Cards de Quizzes -->
      <div class="box-quiz">
  @foreach ($quizzes as $quiz)
    <a href="{{ route('quiz.load', $quiz->id) }}">
      <div class="quiz" style="background-image: url('{{ $quiz->imagem }}'); background-size: cover; background-repeat: no-repeat;">
        <div class="overlay">
          <div class="titulo">{{ $quiz->titulo }}</div>
        </div>
        <div class="detalhes">
          <div><strong>Título:</strong>&nbsp;&nbsp;{{ $quiz->titulo }}</div>
          <div><strong>Descrição:</strong>&nbsp;&nbsp;{{ $quiz->descricao }}</div>
        </div>
      </div>
    </a>
  @endforeach

  @if ($quizzes->isEmpty())
    <p class="text-white text-center mt-3">Não há recomendações no momento.</p>
  @endif
</div>


      <!-- Botão Próximo -->
      <button class="btn botao-carrossel ms-2" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
      </button>
    </div>
  </div>

  
  <div class="adicionar btn mx-auto" style="max-width: 100%; width: 950px; height: 40px;">Ver mais...</div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
