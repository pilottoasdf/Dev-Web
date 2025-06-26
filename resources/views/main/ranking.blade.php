<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Ranking</title>
  @vite(['resources/css/ranking.css', 'resources/js/app.js'])
</head>
<body>
  <div id="app">
    <menu-component
      user-name="{{ auth()->user()->name }}"
      user-email="{{ auth()->user()->email }}"
      logout-url="{{ route('logout') }}"
    ></menu-component>
  </div>

  <main class="ranking-wrapper">
    <div class="ranking-box">
      <div class="ranking-header">
        <div class="tab selected">Quiz</div>
        <div class="tab">Jogos</div>
      </div>

      <div class="ranking-table">
        <div class="ranking-header-row">
          <span>Usuários</span>
          <span>Troféus</span>
        </div>

        @for ($i = 1; $i <= 4; $i++)
        <div class="ranking-row">
          <div class="ranking-user">
            <span>{{ $i }}º Nome de usuário</span>
          </div>
          <div class="ranking-score">
            <span>X</span>
            <img src="https://png.pngtree.com/png-clipart/20250103/original/pngtree-gold-trophy-icon-trophy-icon-winner-icon-png-image_4979039.png" alt="Troféu" style="width: 20px; height: 20px;">
          </div>
        </div>
        @endfor
      </div>

      <div class="ranking-footer">
        <a href="{{ url()->previous() }}" class="btn-voltar">Voltar</a>
      </div>
    </div>
  </main>
</body>
</html>
