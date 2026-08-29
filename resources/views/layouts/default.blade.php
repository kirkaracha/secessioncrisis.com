<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.partials.head-top')

    <title>
        @include('layouts.partials.html-title')
    </title>

    @include('layouts.partials.head-bottom')
    @include('layouts.partials.styles')

</head>
<body @if (isset($bodyClass)) class="{{ $bodyClass }}" @endif>

<div class="wrapper">
    @include('layouts.partials.site-header')
    @include('layouts.partials.main-navigation')

    <main class="container main-contents" id="main-contents">
        @yield('breadcrumbs')

        @include('layouts.partials.errors')

        <header class="page-header level">
            <h1 class="page-title level-left">
                @yield('title', 'Untitled')
            </h1>
        </header>

        @yield('contents')

        @if (isset($next) || isset($previous))
            @include('layouts.partials.next-previous-page')
        @endif
    </main>

    @include('layouts.partials.site-footer')
</div>

@include('layouts.partials.scripts')

</body>
</html>
