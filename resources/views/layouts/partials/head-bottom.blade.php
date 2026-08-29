<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

@if (isset($canonical))
    <link rel="canonical" href="{{ $canonical }}">
@endif
@if (isset($previous))
    <link rel="prev" href="{{ $previous->url }}">
@endif
@if (isset($next))
    <link rel="next" href="{{ $next->url }}">
@endif

@env('production')
    @include('layouts.partials.matomo')
@endenv
