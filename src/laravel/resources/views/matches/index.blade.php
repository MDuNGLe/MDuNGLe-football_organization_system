@extends('layouts.app')

@push('scripts')
    <script src="{{asset ('js/fullcalendar.js')}}"></script>
@endpush
@section('content')
    <h1>Матч</h1>

    <a href="{{ route('matches.create') }}">Создание нового поле</a>

    <div id="calendar"></div>


    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Дата и время начала</th>
                <th>Дата и время окончание</th>
                <th>Местоположение</th>
                <th>Статус матча</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
            <tr>
                <td>{{ $match->id }}</td>
                <td>{{ $match->start_at }}</td>
                <td>{{ $match->end_at }}</td>
                <td>{{ $match->field->name }}</td>
                <td>{{ $match->status }}</td>
                <td>
                    <a href="{{ route('matches.edit', $match->id) }}">Редактировать</a>
                    <form action="{{ route('matches.destroy', $match->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection