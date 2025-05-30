{{ auth()->user()->name  }}
<br>
{{ auth()->user()->email  }}
<br>
<a href="{{ route('forcar-logout') }}">Clica aqui pra deslogar</a>