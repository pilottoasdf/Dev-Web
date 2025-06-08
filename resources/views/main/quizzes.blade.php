<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Quizzes</title>
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
    <a href="{{ route('quizzes.lista') }}"><button>Quizzes</button></a>
  </div>

  <h1>Quizzes</h1>

  <div style="display:flex; flex-direction:row;">
    @foreach($dados as $vetor)
      <div style="border: solid 1px yellow; color: orange;">
        {{ $vetor['quiz']->titulo }}
        <br>
        {{ $vetor['quiz']->disciplina }}
        <br>
        {{ $vetor['quiz']->escolaridade_recomendada }}
        <br>
        {{ $vetor['criador']->name }}
      </div>
    @endforeach
  </div>

  
</body>
</html>
