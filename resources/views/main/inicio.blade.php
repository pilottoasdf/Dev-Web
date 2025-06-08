<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Início</title>
  @vite(['resources/css/inicio.css', 'resources/js/inicio.js', 'resources/js/app.js'])
</head>
<body>
  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      logout-url="{{ route('logout') }}"
    ></menu-component>
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

  <div class="cards-container">
    <div class="card">
      <img src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Jogo 1" />
      <div class="card-content">
        <h3>Jogo 1</h3>
        <p>Texto do jogo 1</p>
        <small>Disciplina do jogo 1</small>
      </div>
    </div>

    <div class="card">
      <img src="https://blog.ebaconline.com.br/blog/wp-content/uploads/2022/12/kcnb4lkkucfipej3ngqxm-scaled-e1674744655926.jpeg" alt="Jogo 2" />
      <div class="card-content">
        <h3>Quiz 1</h3>
        <p>Texto do quiz 1.</p>
        <small>Disciplina do quiz 1</small>
      </div>
    </div>

    <div class="card adicionar">+</div>
  </div>
</body>
</html>
