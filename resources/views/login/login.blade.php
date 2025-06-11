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
          <label class="login_pegunta" for="email">Login:</label>
          <input type="text" id="email" name="email" value="{{ old('email') }}">
          @error('email')
            <span class="error-message">{{ $message }}</span>
          @enderror

          <label class="login_pegunta" for="password">Senha:</label>
          <input type="password" id="password" name="password">
          @error('password')
            <span class="error-message">{{ $message }}</span>
          @enderror
          
          <a class="esqueci_senha" href="/forgot_password">Esqueci a senha</a>
          <button type="submit">Acessar</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>