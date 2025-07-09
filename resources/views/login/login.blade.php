<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - GameMind</title>
  @vite('resources/css/login2.css')
</head>
<body>
  
  <div class="form_container">
    <div class="tabs">
      <a href="login" class="tab active">Entrar</a>
      <a href="cadastro" class="tab">Cadastrar</a>
    </div>

    <div class="form_login">
      <form method="POST" action="{{ route('login') }}" class="form">
        @csrf
        <div class="login_senha">
        <label class="login_pegunta" for="email">Login:</label><br>
        <input type="text" id="email" name="email"><br>
        @error('email')
        <span class="error-message">{{ $message }}</span>
        @enderror
        <label class="login_pegunta" for="password">Senha:</label><br>
        <input type="password" id="password" name="password"><br><br><br><br>
        @error('password')
        <span class="error-message">{{ $message }}</span>
        @enderror
        </div>
        <a class="esqueci_senha" href="/cadastro">Esqueci a senha</a>
        <button type="submit">Acessar</button>
      </form>
    </div>
  </div>
</body>
</html>
