<div class="next-previous-page row">
    @if (isset($previous))
        <a href="{{ $previous->url }}"
           class="previous-page">
            Previous
            <small>{{ $previous->title }}</small>
        </a>
    @endif
    @if (isset($next))
        <a href="{{ $next->url }}"
           class="next-page">
            Next
            <small>{{ $next->title }}</small>
        </a>
    @endif
</div>
