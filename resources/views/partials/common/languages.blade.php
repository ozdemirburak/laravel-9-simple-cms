@if(count($languages))
    <ul class="languages text-center">
        @foreach($languages as $lang)
            <li>
                @if (!empty($lang->flag) && file_exists(asset($lang->flag)))
                    <img id="lang_{{ $lang->code }}" class="img-circle chosen-one" src="{{ asset($lang->flag) }}" alt="{{ $lang->title }}" data-code="{{ $lang->code }}" value="{{ $lang->code }}" />
                @else
                    <span data-code="{{ $lang->code }}" class="chosen-one">{{ $lang->code }}</span>
                @endif
            </li>
        @endforeach
        {!! Form::open(['method' => 'POST', 'route' => $route, 'id' => 'anakin-skywalker']) !!}
            {!! Form::hidden('language') !!}
        {!! Form::close() !!}
    </ul>
@endif
