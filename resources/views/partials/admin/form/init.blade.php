<section class="section">
    <div class="container">
        <h1 class="title">{{ __('admin.' . $resource . '.' . ($action ?? 'edit')) }}</h1>
        @php [$name, $id] = ${$resource} !== null ? ['update', ${$resource}->id] : ['store', null] @endphp
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.' . $resource . '.' . $name, $id) }}">
        @include('partials.admin.errors')

