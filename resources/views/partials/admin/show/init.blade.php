<section class="section">
    <div class="container">
        <h1 class="title">{{ __('admin.' . $resource . '.' . ($action ?? 'show')) }}</h1>
        @php [$name, $id] = ${$resource} !== null ? ['update', ${$resource}->id] : ['store', null] @endphp
        @include('partials.admin.errors')

