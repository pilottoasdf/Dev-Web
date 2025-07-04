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
    @vite(['resources/css/inicio.css', 'resources/css/perfil.css','resources/js/app.js'])
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

        <span id="imagem">aqui jaz a foto de perfil</span>
        <span id="nome">{{ $user->name }}</span>

        <div id="conquistas">
            <p>🏆Troféus: {{ $progressos[0]->total }}</p>
            <p>🌟Estrelas: {{ round($progressos[0]->media_pontos, 2) }}</p>
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

            <form action="{{ route('projetos') }}" method="GET">
                <button class="btn-personalizado" type="submit">Meus Projetos</button>
            </form>
        </div>
    </div>
 

</body>
</html>