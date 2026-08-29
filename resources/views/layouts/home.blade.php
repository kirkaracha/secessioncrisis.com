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
<body class="home">

<div class="wrapper">
    @include('layouts.partials.site-header')
    @include('layouts.partials.main-navigation')

    <main class="container main-contents" id="main-contents">
        @include('layouts.partials.errors')

        @yield('contents')
    </main>

    @include('layouts.partials.site-footer')
</div>

@include('layouts.partials.scripts')

</body>
</html>
