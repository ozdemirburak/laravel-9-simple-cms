@if (isset($errors) && count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="notification is-warning">
            <span class="icon"><span class="ion-{{ config('settings.defaults.icon.warning') }}"></span></span> {{ $error }}
        </div>
    @endforeach
@endif
