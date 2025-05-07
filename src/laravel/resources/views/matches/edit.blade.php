@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать команду</h1>

    <form action="{{ route('matches.update', $match) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div>
            <label for="statistics" class="form-label">Статистика</label>
            <textarea name="statistics" class="form-control">{{ $team->statistics }}</textarea>
        </div>

        <div>
            <label for="datetime" class="form-label">Дата и время</label>
            <input type="datetime-local" name="datetime" class="form-control" value="{{ $team->datetime }}" required>
        </div>

        <div>
            <label for="location" class="form-label">Место</label>
            <input type="text" name="location" class="form-control" value="{{ $team->location }}" required>
        </div>

        <div>
            <label for="status" class="form-label">Статус</label>
            <select name="status" class="form-control" required>
                <option value="scheduled" {{ $team->status == 'scheduled' ? 'selected' : '' }}>Запланирован</option>
                <option value="completed" {{ $team->status == 'completed' ? 'selected' : '' }}>Завершён</option>
                <option value="cancelled" {{ $team->status == 'cancelled' ? 'selected' : '' }}>Отменён</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('matches.index') }}" class="btn btn-secondary">Отмена</a>
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
