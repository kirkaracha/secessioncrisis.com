@hasSection('windowTitle')
    @yield('windowTitle') -
@else
    @yield('title', 'Untitled') -
@endif
{{ config('app.name') }}
