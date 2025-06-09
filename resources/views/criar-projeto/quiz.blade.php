<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Criar quiz</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/inicio.css', 'resources/js/app.js'])
</head>
<body>
  <div id="app">
    <menu-component 
      user-name="{{ auth()->user()->name }}" 
      user-email="{{ auth()->user()->email }}"
      logout-url="{{ route('logout') }}"
    ></menu-component>

    <criapergunta-component>
        
    </criapergunta-component>
  </div>


</body>