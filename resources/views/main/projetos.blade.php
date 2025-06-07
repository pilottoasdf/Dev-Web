<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Início</title>
  @vite('resources/css/inicio.css')
</head>
<body>
  <div class="perfil">
    <div class="bolinha"></div>
    <div class="info">
      <span class="jogando-como">Jogando como</span>
      {{ auth()->user()->name }}
      <br>
      {{ auth()->user()->email }}
      <br>
      <a href="{{ route('forcar-logout') }}">Clica aqui pra deslogar</a>
    </div>
  </div>

  <div class="menu-superior">
    <button>Página Inicial</button>
    <button>Games</button>
    <button>Quizzes</button>
  </div>

  <div style="display:flex; flex-direction:row;">
    @foreach($quizzes as $quiz)
      <div style="border: solid 1px yellow; color: orange;">
        {{ $quiz->titulo }}
        <br>
        {{ $quiz->disciplina }}
        <br>
        {{ $quiz->escolaridade_recomendada }}
        <br>
        {{ $criador }}
      </div>
    @endforeach
  </div>

  
</body>
</html>
