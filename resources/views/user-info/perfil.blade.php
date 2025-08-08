<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
    @vite(['resources/css/inicio.css', 'resources/css/perfil.css', 'resources/js/app.js'])
</head>
<body>

    <div id="app">
        <menu-component 
            user-name="{{ auth()->user()->name }}" 
            user-email="{{ auth()->user()->email }}"
            logout-url="{{ route('logout') }}"
            perfil="{{ true }}"
        ></menu-component>
    </div>

    <div class="container">
    @if(isset($user->foto_perfil))
            <img src="{{ asset('storage/' . $user->foto_perfil) }}" alt="Foto de Perfil">
        @else
            <img src="https://i.pinimg.com/736x/e6/e4/df/e6e4df26ba752161b9fc6a17321fa286.jpg" alt="Foto de Perfil">
        @endif
        <div id="img_opt">
            <form action="{{ route('foto.inserir') }}" method="get">
                    <input type="submit" value="Trocar foto">  
            </form>
            @if($user->foto_perfil)
                <form action="{{ route('foto.remover') }}" method="post">
                    @csrf
                    @method('DELETE')
                        <input type="submit" value="Remover">  
                </form>
            @endif
        </div>
        <span id="nome">{{ $user->name }}</span>

        <div id="conquistas">
            <p>🏆Troféus: @if (isset($progresso)){{ $progresso->total_trofeus }} @else 0 @endif </p>
            <p>🌟Estrelas: @if (isset($progresso)) {{ round($progresso->media_pontos, 2) }} @else 0 @endif </p>
        </div>

        <div class="recent-opened">
            <h3>Abertos Recentemente</h3>
            <ul>
                @foreach($abertosRecentemente as $item)
                    <li>
                        <a href="{{ route('quiz.load', $item->quiz->id) }}">
                            {{ $item->quiz->titulo }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <form action="{{ route('logout') }}" method="get">
            <button class="btn-personalizado" id="btn-logout" type="submit">Desconectar</button>
        </form>

        <div id="botoes">
            <form action="{{ route('user.info') }}" method="GET">
                <button class="btn-personalizado" type="submit">Informações do Usuário</button>
            </form>

            <form action="{{ route('ranking') }}" method="GET">
                <button class="btn-personalizado" type="submit">Ranking</button>
            </form>

            @if ($user->nivel_acesso==2)
            <form action="{{ route('projetos') }}" method="GET">
                <button class="btn-personalizado" type="submit">Meus Projetos</button>
            </form>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>
