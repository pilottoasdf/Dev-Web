<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Quizzes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
  @vite(['resources/css/inicio.css', 'resources/js/app.js', 'resources/css/quizzes.css'])
</head>
<body>
  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      logout-url="{{ route('logout') }}"
    ></menu-component>
  </div>

  <h1 class="quizzes-title">Quizzes</h1>

 <div class="box-quiz">
  @foreach($dados as $vetor)
    <a href="quiz/{{ $vetor['quiz']->id }}">
      <div class="quiz" style="background-image: url('{{ asset('storage/' . $vetor['quiz']->imagem) }}');">
        <div class="overlay">
          <div class="titulo">{{ $vetor['quiz']->titulo }}</div>
        </div>
        <div class="detalhes">
          <strong>Título:</strong>   {{ $vetor['quiz']->titulo }}<br>
          <strong>Disciplina:</strong>   {{ $vetor['quiz']->disciplina }}<br>
          <strong>Criador:</strong>   {{ $vetor['criador']->name }}<br>
          <strong>Escolaridade:</strong>   {{ $vetor['quiz']->escolaridade_recomendada }}
        </div>
      </div>
    </a>
  @endforeach
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
