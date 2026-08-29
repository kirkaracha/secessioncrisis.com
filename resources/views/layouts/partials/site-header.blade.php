<!--suppress HtmlUnknownAnchorTarget -->
<a href="#main-contents" class="skip-navigation">
    Skip to main content
</a>

<header>
    @if (request()->routeIs('home.index'))
        <h1 class="site-title">
            {{ config('app.name') }}
        </h1>
    @else
        <div class="site-title">
            <a href="{{ route('home.index') }}">
                {{ config('app.name') }}
            </a>
        </div>
    @endif
</header>

@isset($mainNavigation)
    <nav class="navigation" aria-label="Primary">
        {!! $mainNavigation !!}
    </nav>
@endisset
