<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>\Usuários</title>
</head>
<body>
    <h1>Usuários</h1>
<hr>

@if ($errors->any())
    <div style="color:red">
    <h3><b>Erro!</b></h3>

    <ul>
        @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
        @endforeach
    </ul>
    </div>
@endif 

<form action="{{ route('auth.login') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
    <br>
    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
    <br><br>
    <input type="password" name="password" placeholder="Senha">
    <br>
    <input type="password" name="password_confirmation" placeholder="Confirme a senha">
    <br><br>
    <input type="submit" value="Gravar">
</form>
</body>
</html>