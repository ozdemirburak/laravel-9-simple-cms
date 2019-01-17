@if ($errors->any() || !empty(session('csrf_error')))
    <div class="alert alert-danger validation">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="text-left">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            @if (!empty(session('csrf_error')))
                <li>{{ session('csrf_error') }}</li>
            @endif
        </ul>
    </div>
@endif
