<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - GameMind</title>
</head>
<body>
    <div>
        <a href="login">Entrar</a>
        <a href="cadastro">Cadastrar</a>
    </div>
    <form method="POST" action="">
        @csrf
        <input type="email" name="email" placeholder="E-mail" required><br>
        <input type="text" name="username" placeholder="Nome de usuário" required><br><br>

        <label><input type="radio" name="tipo" value="discente"> Sou discente</label><br>
        <label><input type="radio" name="tipo" value="docente"> Sou docente</label><br><br>

        <select name="escolaridade">
            <option value="">Escolaridade</option><br>
            <option value="fundamental">Fundamental</option><br>
            <option value="médio">Médio</option><br>
            <option value="superior">Superior</option><br>
        </select><br><br>

        <input type="date" name="data_nascimento" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <input type="password" name="password_confirmation" placeholder="Confirmar senha" required><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>