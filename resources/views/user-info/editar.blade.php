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
    @vite(['resources/css/editar.css', 'resources/css/inicio.css','resources/js/app.js'])
</head>
<body>
    <br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div id="card" style="min-width: 700px;">
        <form id="campos" action="{{ route('user.atualizar') }}" method="post">
            @method('PUT')
            @csrf

            <div>
                <label for="name">Nome: </label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <div>
                <label for="email">E-mail: </label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <div>
                <label for="escolaridade">Escolaridade: </label>
                <input type="text" name="escolaridade" value="{{ old('escolaridade',$user->escolaridade) }}">
            </div>

            <div> 
                <label for="data_nasc">Data de nascimento: </label>
                <input type="date" name="data_nasc" value="{{ old('data_nasc', $user->data_nasc) }}">
            </div>

            <input type="submit" value="Salvar alterações">

        </form>

        <form id="btn" action="{{ route('user.info') }}" method="GET">
            <button type="submit">Voltar</button>
        </form>

    </div>

</body>
</html>