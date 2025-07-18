<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
    @vite(['resources/css/inicio.css', 'resources/css/foto.css','resources/js/app.js'])
    <title>Atualizar foto de perfil</title>
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

    <h1>Atualizar foto</h1>

    <div id="card">
        <form action="{{ route('foto.upload') }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <label for="foto_perfil">Escolher arquivo</label>
            <input type="file" name="foto_perfil" id="foto">
            <input type="submit" value="Salvar">
        </form>
        <form action="{{ route('perfil.info') }}" method="GET">
            <button id="btn" type="submit">Voltar</button>
        </form>
    </div>

</body>
</html>