<nav aria-label="Main">
    <ul>
        @if (request()->segment(1) === null)
            <li>
                <a href="/" aria-current="page">Home</a>
            </li>
        @else
            <li>
                <a href="/">Home</a>
            </li>
        @endif
        @if (request()->segment(1) === 'about')
            <li>
                <a href="/about" aria-current="page">About</a>
            </li>
        @else
            <li>
                <a href="/about">About</a>
            </li>
        @endif
    </ul>
</nav>
