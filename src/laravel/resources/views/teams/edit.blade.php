@extends('layouts.app')

@section('content')
<div>
    <h1>Редактировать команду</h1>

    <form action="{{ route('teams.update', $team) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Название</label>
            <input type="text" name="name" value="{{ $team->name }}" required>
        </div>

        <div>
            <label for="emblem">URL эмблемы</label>
            <input type="file" name="emblem">
        </div>

        <div>
            <label for="description">Описание</label>
            <textarea name="description">{{ $team->description }}</textarea>
        </div>

        <div>
            <label for="statistics">Статистика</label>
            <textarea name="statistics">{{ $team->statistics }}</textarea>
        </div>

        <button type="submit">Сохранить</button>
        <a href="{{ route('teams.index') }}">Отмена</a>
    </form>
</div>
@endsection