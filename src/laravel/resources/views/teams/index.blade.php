@extends('layouts.app')

@section('content')
    <h1>Teams</h1>

    <a href="{{ route('teams.create') }}">Create New Team</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Statistics</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->name }}</td>
                    <td>
                        @if($team->emblem)
                            <img src="{{ asset('storage/' . $team->emblem) }}" alt="Logo" width="50">
                        @else
                            No logo
                        @endif
                    </td>
                    <td>{{ $team->statistics }}</td>
                    <td>
                        <a href="{{ route('teams.edit', $team) }}">Edit</a>
                        <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

@endsection
