@extends('layouts.home')

@section('title', $title ?? 'Untitled')

@section('contents')
    <link rel="stylesheet" href="https://unpkg.com/maplibre-gl@^6.6.0/dist/maplibre-gl.css" />
    <div id="map" style="height: 400px"></div>
    <script type="module">
        import * as maplibregl from 'https://unpkg.com/maplibre-gl@^6.6.0/dist/maplibre-gl.mjs';

        const map = new maplibregl.Map({
            container: 'map', // container id
            style: 'https://demotiles.maplibre.org/globe.json', // style URL
            center: [0, 0], // starting position [lng, lat]
            zoom: 2 // starting zoom
        });
    </script>
@endsection
