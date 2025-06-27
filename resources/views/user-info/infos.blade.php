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
    @vite(['resources/css/inicio.css', 'resources/css/info.css','resources/js/app.js'])
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

    <div id="card" style="min-width: 400px;">
        <p><strong>Nome de usuário:</strong> {{ $user->name }}</p>
        <p><strong>E-mail:</strong> {{ $user->email }}</p>
        <p><strong>Escolaridade:</strong> {{ $user->escolaridade ?? 'Não informado' }}</p>
        <p><strong>Data de nascimento:</strong> {{ $date ?? 'Não informado' }}</p>
    </div>
 

</body>
</html>