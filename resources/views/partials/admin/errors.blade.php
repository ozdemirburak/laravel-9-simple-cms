@if (count($errors) > 0)
    <article class="message is-danger">
        <div class="message-body">
            @foreach ($errors->all() as $error)
                <p class="help is-danger">
                    <span class="icon">{!! icon('warning') !!}</span>
                    <span>{{ $error }}</span>
                </p>
            @endforeach
        </div>
    </article>
@endif
