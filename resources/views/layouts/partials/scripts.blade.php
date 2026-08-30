
@vite(['resources/js/app.js'])

@if (isset($useMapScript) && $useMapScript === true)
    @vite(['resources/js/map.js'])
@endif

@stack('scripts')
