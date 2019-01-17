@if (count($errors) > 0)
    <article class="message is-danger">
        <div class="message-body">
            @foreach ($errors->all() as $error)
                <p class="help is-danger">
                    <span class="icon">{!! icon('alert-circle') !!}</span>
                    <span class="text">{{ $error }}</span>
                </p>
            @endforeach
        </div>
    </article>
@endif
