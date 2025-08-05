<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Ranking</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
  @vite(['resources/css/ranking.css','resources/css/inicio.css', 'resources/js/app.js'])
</head>
<body>

  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      user-nivel="{{ auth()->user()->nivel_acesso }}"
      user-foto="{{ auth()->user()->foto_perfil }}"
      logout-url="{{ route('logout') }}">
    </menu-component>

    <ranking-component dados_quiz='@json($dados_quiz)' dados_jogo='@json($dados_jogo)'></ranking-component>

  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
