<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    // TODO: Try putting this in a module in app.js after confirming it works
    let csrfToken = document.getElementById('csrf-token').content;

    XMLHttpRequest.prototype.realSend = XMLHttpRequest.prototype.send;

    let newSend = function (data) {
        this.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        this.realSend(data);
    };

    XMLHttpRequest.prototype.send = newSend;
</script>

@vite(['resources/js/app.js'])

@if (isset($useAlpineAjax) && $useAlpineAjax === true)
    @vite(['resources/js/modules/alpine-ajax.js'])
@endif

@if (isset($useMapScript) && $useMapScript === true)
    @vite(['resources/js/modules/map.js'])
@endif

@stack('scripts')
