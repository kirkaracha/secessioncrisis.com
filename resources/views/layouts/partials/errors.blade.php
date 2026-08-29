@if ($errors->any())
    <div class="alert alert-danger">
        <p>There @if ($errors->count() > 1) are some errors @else is an error @endif with your submission:</p>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
