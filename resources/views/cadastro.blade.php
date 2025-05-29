<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro - GameMind</title>
 <link rel="stylesheet" href="{{ url('CSS/cadastro3.css') }}">
</head>
<body>
  <div class="form_cadastro">
    <div class="tabs">
      <a href="login" class="tab">Entrar</a>
      <a href="cadastro" class="tab active">Cadastrar</a>
    </div>

    <form method="POST" action="">
  @csrf

  <div class="flex-row">
  <!-- Coluna esquerda: E-mail e Nome -->
  <div class="flex-column">
    <label class="cadastro_pergunta" for="email">E-mail</label>
    <input type="email" name="email" required />

    <label class="cadastro_pergunta" for="username">Nome do usuário</label>
    <input type="text" name="username" required />
  </div>

  <!-- Coluna direita: rádios centralizados verticalmente -->
  <div class="radios-centered">
    <label class="cadastro_pergunta"><input type="radio" name="tipo" value="discente" /> Sou discente</label>
    <label class="cadastro_pergunta"><input type="radio" name="tipo" value="docente" /> Sou docente</label>
  </div>
</div>


  <div class="flex-row">
    <div class="flex-column">
      <select class="cadastro_pergunta" name="escolaridade" required>
        <option value="" disabled selected>Escolaridade</option>
        <option value="fundamental">Ensino Fundamental I</option>
         <option value="fundamental">Ensino Fundamental II</option>
        <option value="médio">Médio</option>
        <option value="superior">Superior</option>
      </select>
    </div>

    <div class="flex-column">
     
      <input class="cadastro_pergunta" type="date" name="data_nascimento" required />
    </div>
  </div>

  <div class="flex-row">
    <div class="flex-column">
      <label class="cadastro_pergunta" for="password">Senha</label>
      <input type="password" name="password" required />
    </div>

    <div class="flex-column">
      <label class="cadastro_pergunta" for="password_confirmation">Confirmar Senha</label>
      <input type="password" name="password_confirmation" required />
    </div>
  </div>

  <button type="submit">Cadastrar</button>
</form>


  </div>
</body>
</html>