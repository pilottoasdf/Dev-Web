<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Preferências - GameMind</title>
  @vite('resources/css/preferencia.css')
</head>
<body>

@if ($errors->has('preferencias'))
  <div class="error_box">
    {{ $errors->first('preferencias') }}
  </div>
@endif

  <div class="form_cadastro">
    <h2>Selecione suas preferências</h2>

    <form method="POST" action="{{ route('preferencias.store') }}">
      @csrf

      <div class="checkbox-group">
        <label>
          <input type="hidden" name="peso_portugues" value="0">
          <input type="checkbox" name="peso_portugues" value="5" {{ old('peso_portugues') ? 'checked' : '' }}>
          Português
        </label>

        <label>
          <input type="hidden" name="peso_matematica" value="0">
          <input type="checkbox" name="peso_matematica" value="5" {{ old('peso_matematica') ? 'checked' : '' }}>
          Matemática
        </label>

        <label>
          <input type="hidden" name="peso_fisica" value="0">
          <input type="checkbox" name="peso_fisica" value="5" {{ old('peso_fisica') ? 'checked' : '' }}>
          Física
        </label>

        <label>
          <input type="hidden" name="peso_quimica" value="0">
          <input type="checkbox" name="peso_quimica" value="5" {{ old('peso_quimica') ? 'checked' : '' }}>
          Química
        </label>

        <label>
          <input type="hidden" name="peso_biologia" value="0">
          <input type="checkbox" name="peso_biologia" value="5" {{ old('peso_biologia') ? 'checked' : '' }}>
          Biologia
        </label>

        <label>
          <input type="hidden" name="peso_historia" value="0">
          <input type="checkbox" name="peso_historia" value="5" {{ old('peso_historia') ? 'checked' : '' }}>
          História
        </label>

        <label>
          <input type="hidden" name="peso_geografia" value="0">
          <input type="checkbox" name="peso_geografia" value="5" {{ old('peso_geografia') ? 'checked' : '' }}>
          Geografia
        </label>

        <label>
          <input type="hidden" name="peso_filosofia" value="0">
          <input type="checkbox" name="peso_filosofia" value="5" {{ old('peso_filosofia') ? 'checked' : '' }}>
          Filosofia
        </label>

        <label>
          <input type="hidden" name="peso_sociologia" value="0">
          <input type="checkbox" name="peso_sociologia" value="5" {{ old('peso_sociologia') ? 'checked' : '' }}>
          Sociologia
        </label>

        <label>
          <input type="hidden" name="peso_ingles" value="0">
          <input type="checkbox" name="peso_ingles" value="5" {{ old('peso_ingles') ? 'checked' : '' }}>
          Inglês
        </label>
      </div>

      <button type="submit">Salvar Preferências</button>
    </form>
  </div>

</body>
</html>
