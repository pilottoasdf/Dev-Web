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

  
  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      user-nivel="{{ auth()->user()->nivel_acesso }}"
      logout-url="{{ route('logout') }}">
    </menu-component>
  </div>
  

  
  <div class="banner" id="banner">
    <img id="banner-img" src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Banner" />
    <div class="texto" id="banner-texto">
      <p class="titulo-principal">GameMind</p>
      <a href="/quizzes"><button id="btn-comecar">Comece a jogar agora!</button></a>
    </div>
    <div class="arrow arrow-left" id="prev">&#10094;</div>
    <div class="arrow arrow-right" id="next">&#10095;</div>
  </div>

  

<div id="carouselExample" class="carousel slide">
  <h2 class="recomendados">Quizzes recomendados para você:</h2>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carrossel-box-externo">
        <button class="carousel-control-prev botao-carrossel-personalizado" onclick="document.querySelector('.carrossel-box').scrollBy({left: -300, behavior: 'smooth'})">
          ‹
        </button>
        <div class="carrossel-box">
          @foreach ($dados as $quiz)
            <a href="{{ route('quiz.load', $quiz['quiz']->id) }}">
              @if ($quiz['quiz']->imagem!=null)
                <div class="quiz" style="background-image: url('{{ asset('storage/' . $quiz['quiz']->imagem) }}'); background-size: cover; background-repeat: no-repeat;">
              @else
                <div class="quiz" style="background-color: yellow; display:flex; justify-content:center; align-items:center;">
                  <h2 style="color:black;">{{ $quiz['quiz']->titulo }}</h2>
              @endif
                <div class="overlay">
                  <div class="titulo">{{ $quiz['quiz']->titulo }}</div>
                </div>
                <div class="detalhes">
                  <div><strong>Título:</strong>&nbsp;&nbsp;{{ $quiz['quiz']->titulo }}</div>
                  <div><strong>Disciplina:</strong>&nbsp;&nbsp;{{ $quiz['quiz']->disciplina }}</div>
                  <div><strong>Criador:</strong>&nbsp;&nbsp;{{ $quiz['criador']->name }}</div>
                  <div><strong>Escolaridade:</strong>&nbsp;&nbsp;{{ $quiz['quiz']->escolaridade_recomendada }}</div>
                </div>
              </div>
            </a>
          @endforeach
        </div>
        <button class="carousel-control-next botao-carrossel-personalizado" onclick="document.querySelector('.carrossel-box').scrollBy({left: 300, behavior: 'smooth'})">
          ›
        </button>
      </div>
    </div>
  </div>
  @if (count($dados)==0)
    <p class="text-white text-center mt-3">Não há quizzes recomendados no momento...</p>
  @endif

  <h2 class="recomendados mt-5">Jogos recomendados para você:</h2>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carrossel-box-externo">
        <button class="carousel-control-prev botao-carrossel-personalizado" onclick="document.querySelector('.carrossel-box-jogos').scrollBy({left: -300, behavior: 'smooth'})">
          ‹
        </button>
        <div class="carrossel-box carrossel-box-jogos">
          @foreach ($dadosJogos as $jogo)
            <a href="{{ route('jogo.load', $jogo['jogo']->id) }}">
              @if ($jogo['jogo']->imagem!=null)
                <div class="quiz" style="background-image: url('{{ asset('storage/' . $jogo['jogo']->imagem) }}'); background-size: cover; background-repeat: no-repeat;">
              @else
                <div class="quiz" style="background-color: #90caf9; display:flex; justify-content:center; align-items:center;">
                  <h2 style="color:black;">{{ $jogo['jogo']->titulo }}</h2>
              @endif
                <div class="overlay">
                  <div class="titulo">{{ $jogo['jogo']->titulo }}</div>
                </div>
                <div class="detalhes">
                  <div><strong>Título:</strong>&nbsp;&nbsp;{{ $jogo['jogo']->titulo }}</div>
                  <div><strong>Disciplina:</strong>&nbsp;&nbsp;{{ $jogo['jogo']->disciplina }}</div>
                  <div><strong>Criador:</strong>&nbsp;&nbsp;{{ $jogo['criador']->name }}</div>
                  <div><strong>Escolaridade:</strong>&nbsp;&nbsp;{{ $jogo['jogo']->escolaridade_recomendada }}</div>
                </div>
              </div>
            </a>
          @endforeach
        </div>
        <button class="carousel-control-next botao-carrossel-personalizado" onclick="document.querySelector('.carrossel-box-jogos').scrollBy({left: 300, behavior: 'smooth'})">
          ›
        </button>
      </div>
    </div>
  </div>
  @if (count($dadosJogos)==0)
    <p class="text-white text-center mt-3">Não há jogos recomendados no momento...</p>
  @endif
</div>

  
  


  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
