<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Criar projeto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jaini&display=swap" rel="stylesheet">
  @vite(['resources/css/form.css','resources/css/inicio.css', 'resources/js/app.js']) 
</head>
<body>
  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      logout-url="{{ route('logout') }}"
    ></menu-component>
  </div>

  <form method="post" class="form-criar" action="{{ route('quiz-jogo.create') }}" enctype="multipart/form-data">
    @csrf
    <label for="titulo">Título:</label>
    <input type="text" placeholder="Insire um título aqui..." name="titulo" id="titulo" value="{{ old('titulo') }}" required>

    <label for="disciplina">Disciplina:</label>
    <select type="text" name="disciplina" id="disciplina" required>
      <option value="Português" {{ old('disciplina') == 'Português' ? 'selected' : '' }}>Português</option>
      <option value="Matemática" {{ old('disciplina') == 'Matemática' ? 'selected' : '' }}>Matemática</option>
      <option value="Física" {{ old('disciplina') == 'Física' ? 'selected' : '' }}>Física</option>
      <option value="Química" {{ old('disciplina') == 'Química' ? 'selected' : '' }}>Química</option>
      <option value="Biologia" {{ old('disciplina') == 'Biologia' ? 'selected' : '' }}>Biologia</option>
      <option value="História" {{ old('disciplina') == 'História' ? 'selected' : '' }}>História</option>
      <option value="Geografia" {{ old('disciplina') == 'Geografia' ? 'selected' : '' }}>Geografia</option>
      <option value="Filosofia" {{ old('disciplina') == 'Filosofia' ? 'selected' : '' }}>Filosofia</option>
      <option value="Sociologia" {{ old('disciplina') == 'Sociologia' ? 'selected' : '' }}>Sociologia</option>
      <option value="Inglês" {{ old('disciplina') == 'Inglês' ? 'selected' : '' }}>Inglês</option>
    </select>

    <label for="escolaridade_recomendada">Escolaridade recomendada:</label>
    <select type="text" name="escolaridade_recomendada" id="escolaridade_recomendada" required>
      <option value="Fundamental I" {{ old('escolaridade_recomendada') == 'Fundamental I' ? 'selected' : '' }}>Ensino Fundamental I</option>
      <option value="Fundamental II" {{ old('escolaridade_recomendada') == 'Fundamental II' ? 'selected' : '' }}>Ensino Fundamental II</option>
      <option value="Ensino Médio" {{ old('escolaridade_recomendada') == 'Ensino Médio' ? 'selected' : '' }}>Ensino Médio</option>
      <option value="Ensino Superior" {{ old('escolaridade_recomendada') == 'Ensino Superior' ? 'selected' : '' }}>Ensino Superior</option>
    </select>

    <label for="descricao">Descrição do projeto:</label>

    <textarea type="text" class="descricao" placeholder="Insire uma descrição aqui..." name="descricao" id="descricao"> {{ old('descricao') }}</textarea>

    <label for="imagem" class="custom-file-label">Coloque Aqui! A imagem para o seu projeto...</label>

    <input type="file" class="btn-imagem-escolher" name="imagem" id="imagem" value="{{ old('imagem') }}" accept="image/*">

    <span>Seu projeto é um:</span>
    <label>
      <input type="radio" name="tipo" value="quiz" {{ old('tipo') == 'quiz' ? 'checked' : '' }} required/>
      Quiz
    </label>

    <label>
      <input type="radio" name="tipo" value="jogo" {{ old('tipo') == 'jogo' ? 'checked' : '' }} required/>
      Jogo
    </label>
 
    <input type="submit" value="Confirmar">
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>
