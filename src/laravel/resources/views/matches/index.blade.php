<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teams List</title>
    <script defer src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
    <script defer src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.17/locales-all.js'></script>

</head>
<body>
    <h1>Матч</h1>

    <a href="{{ route('matches.create') }}">Создание нового поле</a>

    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ru',
                firstDay: 1,
                events: [
    {
      title  : 'event1',
      start  : '2025-05-05'
    },
    {
      title  : 'event2',
      start  : '2025-05-05',
      end    : '2025-05-05',
    },
    {
      title  : 'event3',
      start  : '2025-05-09T12:30:00',
      allDay : false // will make the time show
    }
  ]
            });
            calendar.render();
        });
        </script>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
            <th>ID</th>
                <th>Дата и время матча</th>
                <th>Местоположение</th>
                <th>Статус матча</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->id }}</td>
                    <td>{{ $match->datetime }}</td>
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
</body>
</html>
