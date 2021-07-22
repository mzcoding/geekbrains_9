<h2>Добро пожаловать! {{ Auth::user()->name }}</h2>
<br>
@if(Auth::user()->avatar)
<img src="{{ Auth::user()->avatar }}" style="width:230px;">
@endif
<br>
<a href="{{ route('admin.index') }}">В админку</a>
<br>
<a href="{{ route('logout') }}">Выход</a>