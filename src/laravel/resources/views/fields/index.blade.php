<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teams List</title>
</head>
<body>
    <h1>Футбольные поля</h1>

    <a href="{{ route('fields.create') }}">Создание нового поле</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
            <th>ID</th>
                <th>Название</th>
                <th>Широта</th>
                <th>Долгота</th>
                <th>Условия бронирования</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fields as $field)
                <tr>
                    <td>{{ $field->id }}</td>
                    <td>{{ $field->name }}</td>
                    <td>{{ $field->latitude }}</td>
                    <td>{{ $field->longitude }}</td>
                    <td>{{ $field->booking_terms }}</td>
                    <td>
                        <a href="{{ route('fields.edit', $field) }}">Редактировать</a>
                        <form action="{{ route('fields.destroy', $field) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
