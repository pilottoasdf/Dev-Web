<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - GameMind</title>
  <link rel="stylesheet" href="{{ url('CSS/login3.css') }}">
</head>
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
<hr>
<body>
  <div class="form_container">
    <div class="tabs">
      <a href="login" class="tab active">Entrar</a>
      <a href="cadastro" class="tab">Cadastrar</a>
    </div>

    <div class="form_login">
      <form method="POST" action="{{ route('login') }}" class="form">
        @csrf
        <label class="login_pegunta" for="email">Login:</label><br>
        <input type="text" id="email" name="email"><br>

        <label class="login_pegunta" for="password">Senha:</label><br>
        <input type="password" id="password" name="password"><br>

        <a class="esqueci_senha" href="/cadastro">Esqueci a senha</a>
        <button type="submit">Acessar</button>
      </form>
    </div>
  </div>
</body>
</html>
