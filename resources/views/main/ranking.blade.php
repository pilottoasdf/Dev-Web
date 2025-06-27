<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Ranking</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
  @vite(['resources/css/ranking.css','resources/css/inicio.css','resources/js/inicio.js', 'resources/js/app.js'])
</head>
<body>

  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      logout-url="{{ route('logout') }}">
    </menu-component>
  </div>

  
  <div class="form_container">
  <div class="tabs">
    <div class="tab active">Quiz</div>
    <div class="tab">Jogos</div>
  </div>

  <div class="form_ranking">
    <div class="scroll-area">
      <div class="separar">
        <span>Usuários</span>
        <span>Pontos</span>
        <span>Troféus</span>
      </div>

      @foreach ($dados as $index=>$vetor)

        <div class="ranking-row"><span>{{ $index+1 }}º {{ $vetor['usuario']->name}} </span><span>Pontos: {{ round($vetor['progresso']->media_pontos, 2) }}</span><span>{{ $vetor['progresso']->total }}X 🏆</span></div><hr>

      @endforeach
      
    </div>

    <button class="ranking-voltar" onclick="window.location.href='{{ route('inicio') }}'">Voltar</button>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
