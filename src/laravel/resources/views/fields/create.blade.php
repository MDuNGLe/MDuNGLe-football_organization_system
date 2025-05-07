@extends('layouts.app')

@section('content')
<link href="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.js"></script>

<style>
body {
    margin: 0;
    padding: 0;
}
.map-form-wrapper {
    display: flex;
    gap: 20px;
    padding: 20px;
    flex-wrap: wrap;
    justify-content: space-between;
}
.form-section {
    flex: 1;
    min-width: 300px;
}
#map {
    width: 600px;
    height: 400px;
    flex-shrink: 0;
}
</style>

<div class="container">
    <div class="map-form-wrapper">
    <!-- @can('create', \App\Models\Field::class) -->
        <section class="form-section">
            <h1>Добавить поле</h1>
            <form action="{{ route('fields.store') }}" method="POST">
                @csrf

                <div>
                    <label for="name" class="form-label">Название поля</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div>
                    <label for="latitude" class="form-label">Широта</label>
                    <input type="text" name="latitude" class="form-control">
                </div>

                <div>
                    <label for="longitude" class="form-label">Долгота</label>
                    <input type="text" name="longitude" class="form-control">
                </div>

                <div>
                    <label for="booking_terms" class="form-label">Описание</label>
                    <textarea name="booking_terms" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Создать</button>
                <a href="{{ route('fields.index') }}" class="btn btn-secondary">Отмена</a>
            </form>
        </section>

        <div id="map"></div>
    </div>
</div>

<!-- @endcan -->

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibWR1bmdsZSIsImEiOiJjbWE0MWpwZGowMjRlMm1zYWo0OXYyMHl6In0.D3p-bCJZRTVOV5EKdErjpQ';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [37.593190837360396, 55.75163017228988],
        zoom: 8
    });

    const marker = new mapboxgl.Marker({ draggable: true })
        .setLngLat([37.593190837360396, 55.75163017228988])
        .addTo(map);

    function onDragEnd() {
        const lngLat = marker.getLngLat();
        const latitude = document.getElementsByName('latitude')[0];
        const longitude = document.getElementsByName('longitude')[0];
        latitude.value = lngLat.lat;
        longitude.value = lngLat.lng;
    }

    marker.on('dragend', onDragEnd);
</script>

@endsection