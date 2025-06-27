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

<div class="box-quiz">
 <ul>
  @foreach($dados as $vetor)
    <li>
        <p>Usuário:{{ $vetor['usuario']->name }}</p>
        <p>Quiz:{{ $vetor['quiz']->titulo }}</p>
        <p>Tentativas:{{ $vetor['progresso']->tentativas }}</p>
        <p>Troféu:{{ $vetor['progresso']->trofeu }}</p>
        <p>Pontos: {{ $vetor['progresso']->pontos }}</p>

    </li>
    <hr>
  @endforeach
  </ul>
</div>

</body>
</html>
