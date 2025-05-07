@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить команду</h1>

    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name" class="form-label">Название</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div>
            <label for="emblem" class="form-label">URL эмблемы</label>
            <input type="file" name="emblem" class="form-control" required>
        </div>

        <div>
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div>
            <label for="statistics" class="form-label">Статистика</label>
            <textarea name="statistics" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Создать</button>
        <a href="{{ route('teams.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
</div>
@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
@endsection
