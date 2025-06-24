<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro - GameMind</title>
  @vite('resources/css/cadastro3.css')
</head>
<body>
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
    @error('email')
      <span class="error-message">{{ $message }}</span>
    @enderror

    <label class="cadastro_pergunta" for="name">Nome do usuário</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required />
    @error('name')
      <span class="error-message">{{ $message }}</span>
    @enderror
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
  @error('nivel_acesso')
      <span class="error-message">{{ $message }}</span>
    @enderror
</div>


  <div class="flex-row">
    <div class="flex-column">
    <select name="escolaridade" required>
    <option value="" disabled {{ old('escolaridade') == '' ? 'selected' : '' }}>Escolaridade</option>
    <option value="Fundamental I" {{ old('escolaridade') == 'Fundamental I' ? 'selected' : '' }}>Ensino Fundamental I</option>
    <option value="Fundamental II" {{ old('escolaridade') == 'Fundamental II' ? 'selected' : '' }}>Ensino Fundamental II</option>
    <option value="Ensino Médio" {{ old('escolaridade') == 'Ensino Médio' ? 'selected' : '' }}>Ensino Médio</option>
    <option value="Ensino Superior" {{ old('escolaridade') == 'Ensino Superior' ? 'selected' : '' }}>Ensino Superior</option>
</select>
@error('escolaridade')
      <span class="error-message">{{ $message }}</span>
    @enderror
    </div>

    <div class="flex-column">
     
      <input class="cadastro_pergunta" type="date" name="data_nasc" value="{{ old('data_nasc') }}" required />
      @error('data_nasc')
      <span class="error-message">{{ $message }}</span>
    @enderror
    </div>
  </div>

  <div class="flex-row">
    <div class="flex-column">
      <label class="cadastro_pergunta" for="password">Senha</label>
      <input type="password" id="password" name="password" required />
      @error('password')
      <span class="error-message">{{ $message }}</span>
    @enderror
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