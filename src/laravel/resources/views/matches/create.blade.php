@extends('layouts.app')

@push('scripts')
    @vite('resources/js/fullcalendar.js')
    <!-- <script src="{{asset ('js/fullcalendar.js')}}"></script> -->
@endpush
@section('content')
<div class="container">
    <h1>Добавить матч</h1>

    <div id="calendar"></div>


    <form action="{{ route('matches.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title" class="form-label">Название матча</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div>
            <label for="start_at" class="form-label">Дата и время начала</label>
            <input type="datetime-local" name="start_at" class="form-control" required>
        </div>

        <div>
            <label for="end_at" class="form-label">Дата и время окончание</label>
            <input type="datetime-local" name="end_at" class="form-control" required>
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
@endsection