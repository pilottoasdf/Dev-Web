<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Meus Projetos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap&icon=add|delete" />
  @vite(['resources/css/inicio.css', 'resources/js/app.js', 'resources/css/quizzes.css'])
</head> 
<body>
  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      user-nivel="{{ auth()->user()->nivel_acesso }}"
      user-foto="{{ auth()->user()->foto_perfil }}"
      logout-url="{{ route('logout') }}"
    ></menu-component>
  </div>

  <h1 class="quizzes-title">Meus Projetos</h1>


<div style="width: 70%; margin: 0 auto;">
  <a href="{{ route('projetos.create') }}" class="adicionar-game-projetos btn mb-1">
    <span class=" simbolo-criar material-symbols-outlined ">add</span>
    Criar projeto
  </a>
</div>


<div class="box-quiz">
 
  @foreach($quizzes as $quiz)
    <a href="quiz/{{ $quiz->id }}">
      @if ($quiz->imagem!=null)
        <div class="quiz" style="background-image: url('{{ asset('storage/' . $quiz->imagem) }}'); background-size: cover; background-repeat: no-repeat;">
      @else
        <div class="quiz" style="background-color: yellow; display:flex; justify-content:center; align-items:center;">
        <h2 style="color:black;">{{ $quiz->titulo }}</h2>
      @endif
        <div class="overlay2">
          <div class="titulo">{{ $quiz->titulo }}</div>
        </div>
        <div class="detalhes2">
          <div><strong>Título:</strong>&nbsp;&nbsp;{{ $quiz->titulo }}</div>
          <div><strong>Disciplina:</strong>&nbsp;&nbsp;{{ $quiz->disciplina }}</div>
          <div><strong>Criador:</strong>&nbsp;&nbsp;{{ $criador }}</div>
          <div><strong>Escolaridade:</strong>&nbsp;&nbsp;{{ $quiz->escolaridade_recomendada }}</div>
        </div>
        <a href="deletar-quiz/{{ $quiz->id }}" class="lixeira material-symbols-outlined">
          delete
        </a>
      </div>
    </a>
  @endforeach
</div>

<div class="box-quiz">
 
  @foreach($jogos as $jogo)
    <a href="jogo/{{ $jogo->id }}">
      @if ($jogo->imagem!=null)
        <div class="quiz" style="background-image: url('{{ asset('storage/' . $jogo->imagem) }}'); background-size: cover; background-repeat: no-repeat;">
      @else
        <div class="quiz" style="background-color: yellow; display:flex; justify-content:center; align-items:center;">
        <h2 style="color:black;">{{ $jogo->titulo }}</h2>
      @endif
        <div class="overlay2">
          <div class="titulo">{{ $jogo->titulo }}</div>
        </div>
        <div class="detalhes2">
          <div><strong>Título:</strong>&nbsp;&nbsp;{{ $jogo->titulo }}</div>
          <div><strong>Disciplina:</strong>&nbsp;&nbsp;{{ $jogo->disciplina }}</div>
          <div><strong>Criador:</strong>&nbsp;&nbsp;{{ $criador }}</div>
          <div><strong>Escolaridade:</strong>&nbsp;&nbsp;{{ $jogo->escolaridade_recomendada }}</div>
        </div>
        <a href="deletar-jogo/{{ $jogo->id }}" class="lixeira material-symbols-outlined">
          delete
        </a>
      </div>
    </a>
  @endforeach
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>