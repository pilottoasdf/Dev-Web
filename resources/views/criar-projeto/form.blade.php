<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Criar projeto</title>
  @vite(['resources/css/inicio.css', 'resources/js/app.js'])
</head>
<body>
  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      logout-url="{{ route('logout') }}"
    ></menu-component>
  </div>

  <form method="post" action="{{ route('quiz-jogo.create') }}" enctype="multipart/form-data">
    @csrf
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required>
    <br>
    <label for="disciplina">Disciplina:</label>
    <select type="text" name="disciplina" id="disciplina" required>
      <option value="portugues" {{ old('disciplina') == 'portugues' ? 'selected' : '' }}>Português</option>
      <option value="matematica" {{ old('disciplina') == 'matematica' ? 'selected' : '' }}>Matemática</option>
      <option value="fisica" {{ old('disciplina') == 'fisica' ? 'selected' : '' }}>Física</option>
      <option value="quimica" {{ old('disciplina') == 'quimica' ? 'selected' : '' }}>Química</option>
      <option value="biologia" {{ old('disciplina') == 'biologia' ? 'selected' : '' }}>Biologia</option>
      <option value="historia" {{ old('disciplina') == 'historia' ? 'selected' : '' }}>História</option>
      <option value="geografia" {{ old('disciplina') == 'geografia' ? 'selected' : '' }}>Geografia</option>
      <option value="filosofia" {{ old('disciplina') == 'filosofia' ? 'selected' : '' }}>Filosofia</option>
      <option value="sociologia" {{ old('disciplina') == 'sociologia' ? 'selected' : '' }}>Sociologia</option>
      <option value="ingles" {{ old('disciplina') == 'ingles' ? 'selected' : '' }}>Inglês</option>''
    </select>
    <br>
    <label for="escolaridade_recomendada">Escolaridade recomendada:</label>
    <select type="text" name="escolaridade_recomendada" id="escolaridade_recomendada" required>
      <option value="fundamentalI" {{ old('escolaridade_recomendada') == 'fundamentalI' ? 'selected' : '' }}>Ensino Fundamental I</option>
      <option value="fundamentalII" {{ old('escolaridade_recomendada') == 'fundamentalII' ? 'selected' : '' }}>Ensino Fundamental II</option>
      <option value="médio" {{ old('escolaridade_recomendada') == 'médio' ? 'selected' : '' }}>Ensino Médio</option>
      <option value="superior" {{ old('escolaridade_recomendada') == 'superior' ? 'selected' : '' }}>Ensino Superior</option>
    </select>
    <br>
    <label for="descricao">Descrição do projeto:</label>
    <br>
    <textarea type="text" name="descricao" id="descricao"> {{ old('descricao') }}</textarea>
    <br>
    <label for="imagem">Imagem para o projeto:</label>
    <input type="file" name="imagem" id="imagem" value="{{ old('imagem') }}" accept="image/*">
    <br>
    <span>Seu projeto é um:</span>
    <br>
    <label>
      <input type="radio" name="tipo" value="quiz" {{ old('tipo') == 'quiz' ? 'checked' : '' }} required/>
      Quiz
    </label>
    <br>
    <label>
      <input type="radio" name="tipo" value="jogo" {{ old('tipo') == 'jogo' ? 'checked' : '' }} required/>
      Jogo
    </label>
    <br>
    <input type="submit" value="Confirmar">
  </form>

</body>