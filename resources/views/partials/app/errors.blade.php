@if (isset($errors) && count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="notification response-notification is-warning has-text-centered">
            <span class="icon">{!! icon('alert-circle') !!}</span>
            <span class="text">{{ $error }}</span>
        </div>
    @endforeach
@endif
@if (session()->has('error'))
    <div class="notification response-notification is-warning has-text-centered">
        <span class="icon">{!! icon('alert-circle') !!}</span>
        <span class="text">{{ session()->get('error') }}</span>
    </div>
@endif
@if (session()->has('success'))
    <div class="notification response-notification is-success has-text-centered">
        <span class="icon">{!! icon('info') !!}</span>
        <span class="text">{{ session()->get('success') }}</span>
    </div>
@endif
