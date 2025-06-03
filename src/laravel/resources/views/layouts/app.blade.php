<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление таблицами</title>
    @stack ('scripts')
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<nav class="">
    <div class="container">
        @auth
            <a class="" href="#">Привет, {{ auth()->user()->name }}</a>
            <a class="" href="{{ route('teams.index') }}">Команды</a>
            <a class="" href="{{ route('fields.index') }}">Футбольные поля</a>
            <a class="" href="{{ route('matches.index') }}">Матчи</a>
            <a class="" href="{{ route('match_team.index') }}">Игры команд</a>
            <a class="" href="{{ route('logout')}}">Выйти</a>
        @else
            <a class="" href="{{ route('register.create') }}">Регистрация</a>
            <a class="" href="{{ route('login') }}">Авторизация</a>
        @endauth
    </div>
</nav>

@yield('content')

</body>
</html>
