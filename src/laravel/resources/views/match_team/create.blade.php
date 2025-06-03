@extends('layouts.app')

@push('scripts')
    @vite('resources/js/live-search.js')
@endpush

@section('content')
<div class="container">
    <h1>Добавить команды в матч</h1>

    <form action="{{ route('match_team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name" class="form-label">Название</label>
            <input type="text" id="name" name="name" class="form-control" required>
            <div id="team-results" class=""></div>
        </div>
            <div>
            <label for="game_match_id" class="form-label">id Матча</label>
            <input value="{{$match->id}}" type="text" id="game_match_id" name="game_match_id" class="form-control" required>
        </div>
        <div>
            <label for="team_id" class="form-label">Название команд</label>
            <input type="text" id="team_id" name="team_id" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-success">Создать</button>
        <a href="{{ route('match_team.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
</div>

@endsection