<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Quizzes</title>
  @vite(['resources/css/inicio.css', 'resources/js/app.js'])
</head>
<body>
  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      logout-url="{{ route('logout') }}"
    ></menu-component>
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
