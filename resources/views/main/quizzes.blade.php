<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Quizzes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=filter_alt" />
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

<div class="linha-topo d-flex justify-content-between align-items-center mb-3 px-3">
  <h1 class="quizzes-title m-0 text-center flex-grow-1">Quizzes</h1>
  <div class="dropdown">
    <button class="btn btn-link p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <span class="filtrar material-symbols-outlined">filter_alt</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end p-3">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="filtro" id="filtro1" value="disciplina">
        <label class="form-check-label" for="filtro1">Disciplina</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="filtro" id="filtro2" value="criador">
        <label class="form-check-label" for="filtro2">Escolaridade</label>
      </div>
      <hr>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="filtro" id="filtro3" value="escolaridade">
        <label class="form-check-label" for="filtro3">Adicionar matérias</label>
      </div>
    </ul>
  </div>
</div>




 <div class="diferente-quiz box-quiz">
  @foreach($dados as $vetor)
    <a href="quiz/{{ $vetor['quiz']->id }}">
      <div class="quiz" style="background-image: url('{{ asset('storage/' . $vetor['quiz']->imagem) }}');">
        <div class="overlay">
          <div class="titulo">{{ $vetor['quiz']->titulo }}</div>
        </div>
        <div class="detalhes">
          <strong>Título:</strong>&nbsp;&nbsp;{{ $vetor['quiz']->titulo }}<br>
          <strong>Disciplina:</strong>&nbsp;&nbsp;{{ $vetor['quiz']->disciplina }}<br>
          <strong>Criador:</strong>&nbsp;&nbsp;{{ $vetor['criador']->name }}<br>
          <strong>Escolaridade:</strong>&nbsp;&nbsp;{{ $vetor['quiz']->escolaridade_recomendada }}
        </div>
      </div>
    </a>
  @endforeach
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
