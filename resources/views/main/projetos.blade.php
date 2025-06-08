<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Meus Projetos</title>
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


  <a href="">Criar projeto</a>
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
