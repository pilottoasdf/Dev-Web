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

      @php
          $disciplinas = [
              'portugues', 'matematica', 'fisica', 'quimica', 'biologia',
              'historia', 'geografia', 'filosofia', 'sociologia', 'ingles'
          ];
      @endphp

      <div class="checkbox-group">
        @foreach ($disciplinas as $disciplina)
          <label>
            <input type="hidden" name="peso_{{ $disciplina }}" value="0">
            <input type="checkbox" name="peso_{{ $disciplina }}" value="1" {{ old('peso_' . $disciplina) ? 'checked' : '' }}>
            {{ ucfirst($disciplina) }}
          </label>
        @endforeach
      </div>

      <button type="submit">Salvar Preferências</button>
    </form>
  </div>

</body>
</html>
