<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Meus Projetos</title>
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

  <h1>Meus Projetos</h1>

  <a href="{{ route('projetos.create') }}">Criar projeto</a>
  <div class="box-quiz">
    @foreach($quizzes as $quiz)
      <a href="quiz/{{ $quiz->id }}">
        <div class="quiz" style="background-image: url('{{ asset('storage/' . $quiz->imagem) }}'); background-size: contain; background-repeat: no-repeat;">
          {{ $quiz->titulo }}
          <br>
          {{ $quiz->disciplina }}
          <br>
          {{ $quiz->escolaridade_recomendada }}
          <br>
          {{ $criador }}
        </div>
      </a>
    @endforeach
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>
