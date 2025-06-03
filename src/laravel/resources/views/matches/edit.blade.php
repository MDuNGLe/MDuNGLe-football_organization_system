@extends('layouts.app')

@push('scripts')
    @vite('resources/js/fullcalendar.js')
@endpush

@section('content')
<div class="container">
    <h1>Редактировать матч</h1>

    <div id="calendar"></div>

    <form action="{{ route('matches.update', $match) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div>
            <label for="title" class="form-label">Название матча</label>
            <input type="text" name="title" class="form-control" value="{{$match->title}}" required>
        </div>
        <div>
            <label for="start_at" class="form-label">Дата и время начала</label>
            <input type="datetime-local" name="start_at" class="form-control" value="{{ $match->start_at }}" required>
        </div>
        <div>
            <label for="end_at" class="form-label">Дата и время окончание</label>
            <input type="datetime-local" name="end_at" class="form-control" value="{{ $match->end_at }}" required>
        </div>

        <div>
            <label for="field_id" class="form-label">Место</label>
            <!-- <input type="text" name="location" class="form-control" required> -->
             <select name="field_id" id="field_id">
                @foreach($fields as $field)
                <option {{$field->id == $match->field_id ? 'selected' : ''}} value="{{ $field -> id }}">{{ $field -> name }}</option>
                @endforeach
             </select>
        </div>

        <div>
            <label for="status" class="form-label">Статус</label>
            <select name="status" class="form-control" required>
                <option value="scheduled" {{ $match->status == 'scheduled' ? 'selected' : '' }}>Запланирован</option>
                <option value="completed" {{ $match->status == 'completed' ? 'selected' : '' }}>Завершён</option>
                <option value="cancelled" {{ $match->status == 'cancelled' ? 'selected' : '' }}>Отменён</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{ route('matches.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
</div>

@endsection
