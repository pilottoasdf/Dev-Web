<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GameMind</title>
</head>
<body>
    <div>
        <a href="login">Entrar</a>
        <a href="cadastro">Cadastrar</a>
    </div>

    <form method="POST" action="#">
        @csrf
        <label>Login:</label><br>
        <input type="text" name="login"><br><br>

        <label>Senha:</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p>Esqueci a senha<a href="/cadastro">Crie aqui!</a></p>
</body>
</html>
