@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Команды в матче: {{ $match->name }}</h1>

    <div class="d-flex justify-content-between mt-4">
        @foreach($teams as $team)
        <div class="card" style="width: 48%;">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">{{ $team->name }}</h4>
            </div>
            <div class="card-body">
                <h5>Статистика в матче:</h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Голевые моменты
                        <span class="badge bg-primary rounded-pill">{{ $team->pivot->goal_moments }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Жёлтые карточки
                        <span class="badge bg-warning rounded-pill">{{ $team->pivot->yellow_cards }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Красные карточки
                        <span class="badge bg-danger rounded-pill">{{ $team->pivot->red_cards }}</span>
                    </li>
                </ul>

                <form action="{{ route('match_team.destroy', $teams->pivot->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить из матча</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        <a href="{{ route('match_team.create', $match) }}" class="btn btn-primary">Добавить команду</a>
    </div>
</div>
@endsection