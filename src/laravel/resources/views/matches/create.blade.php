@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить матч</h1>

    <form action="{{ route('matches.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="datetime" class="form-label">Дата и время</label>
            <input type="datetime-local" name="datetime" class="form-control" required>
        </div>

        <div>
            <label for="field_id" class="form-label">Место</label>
            <!-- <input type="text" name="location" class="form-control" required> -->
             <select name="field_id" id="field_id">
                @foreach($fields as $field)
                <option value="{{ $field -> id }}">{{ $field -> name }}</option>
                @endforeach
             </select>
        </div>

        <div>
            <label for="status" class="form-label">Статус</label>
            <select name="status" class="form-control" required>
                <option value="scheduled">Запланирован</option>
                <option value="completed">Завершён</option>
                <option value="cancelled">Отменён</option>
            </select>
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
