@extends('layouts.app')

@section('content')
<div>
    <h1>Редактировать команду</h1>

    <form action="{{ route('fields.update', $field) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Название поле</label>
            <input type="text" name="name" value="{{ $field->name }}" required>
        </div>

        <div>
            <label for="latitude">Ширина</label>
            <input type="text" name="latitude" value="{{ $field->latitude }}" required>
        </div>

        <div>
            <label for="longitude">Долгота</label>
            <textarea name="longitude">{{ $field->longitude }}</textarea>
        </div>

        <div>
            <label for="booking_terms">Описание</label>
            <textarea name="booking_terms">{{ $field->booking_terms }}</textarea>
        </div>

        <button type="submit">Сохранить</button>
        <a href="{{ route('fields.index') }}">Отмена</a>
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