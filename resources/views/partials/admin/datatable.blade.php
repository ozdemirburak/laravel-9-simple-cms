@if (isset($dataTable))
    {!! $dataTable->table() !!}
    @if (isset($buttons) && $buttons)
        <link rel="stylesheet" href="{{ url('css/buttons.css') }}">
        <script src="{{ url('js/buttons.server-side.js') }}"></script>
    @endif
    {!! $dataTable->scripts() !!}
@endif