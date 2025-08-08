<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Escolher template</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap&icon=add|delete" />
  @vite(['resources/css/inicio.css','resources/css/quizzes.css' ,'resources/js/app.js','resources/css/jogos.css'])
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

    <div class="jogos-criar">
    <button class="alternativa dif red"><a class="text" href="{{ route('jogo.create', 'queda_pergunta') }}">Queda de perguntas</a></button>
    <button class="alternativa dif blue"><a class="text" href="{{ route('jogo.create', 'caca_palavras') }}">Caça-palavras</a></button>
    <button class="alternativa dif pink"><a class="text" href="{{ route('jogo.create', 'corrida') }}">Corrida</a></button>
    <button class="alternativa dif yellow"><a class="text" href="{{ route('jogo.create', 'coisa') }}">Alguma coisa a mais se der tempo</a></button>
</div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>