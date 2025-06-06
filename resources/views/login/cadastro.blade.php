<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro - GameMind</title>
 <link rel="stylesheet" href="{{ url('CSS/cadastro3.css') }}">
</head>
<body>
  
 @if ($errors->any())
  <div class="error-box">
    <h3><b>Erro!</b></h3>
    <ul>
      @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
      @endforeach
    </ul>
  </div>
@endif
  <div class="form_cadastro">
    <div class="tabs">
      <a href="login" class="tab">Entrar</a>
      <a href="cadastro" class="tab active">Cadastrar</a>
    </div>

    <form method="POST" action="{{ route ('cadastrar') }}">
  @csrf

  <div class="flex-row">
  <div class="flex-column">
    <label class="cadastro_pergunta" for="email">E-mail</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required />

    <label class="cadastro_pergunta" for="name">Nome do usuário</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required />
  </div>

  <div class="radios-inline">
    <label>
      <input type="radio" name="nivel_acesso" value="1" {{ old('nivel_acesso') == 1 ? 'checked' : '' }} />
      Sou discente
    </label>
    <label>
      <input type="radio" name="nivel_acesso" value="2" {{ old('nivel_acesso') == 2 ? 'checked' : '' }} />
      Sou docente
    </label>
  </div>
</div>


  <div class="flex-row">
    <div class="flex-column">
    <select name="escolaridade" required>
    <option value="" disabled {{ old('escolaridade') == '' ? 'selected' : '' }}>Escolaridade</option>
    <option value="fundamentalI" {{ old('escolaridade') == 'fundamentalI' ? 'selected' : '' }}>Ensino Fundamental I</option>
    <option value="fundamentalII" {{ old('escolaridade') == 'fundamentalII' ? 'selected' : '' }}>Ensino Fundamental II</option>
    <option value="médio" {{ old('escolaridade') == 'médio' ? 'selected' : '' }}>Ensino Médio</option>
    <option value="superior" {{ old('escolaridade') == 'superior' ? 'selected' : '' }}>Ensino Superior</option>
</select>

    </div>

    <div class="flex-column">
     
      <input class="cadastro_pergunta" type="date" name="data_nasc" value="{{ old('data_nasc') }}" required />
    </div>
  </div>

  <div class="flex-row">
    <div class="flex-column">
      <label class="cadastro_pergunta" for="password">Senha</label>
      <input type="password" id="password" name="password" required />
    </div>

    <div class="flex-column">
      <label class="cadastro_pergunta" for="password_confirmation">Confirmar Senha</label>
      <input type="password" id="password_confirmation" name="password_confirmation" required />
    </div>
  </div>

  <button type="submit">Cadastrar</button>
</form>
</div>
</body>
</html>