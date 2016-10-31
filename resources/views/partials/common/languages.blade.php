@if(count($languages))
    <ul class="languages text-center">
        @foreach($languages as $lang)
            <li>
                <img id="lang_{{ $lang->code }}" class="img-circle chosen-one" title="{{ $lang->title }}"
                     src="{{ asset($lang->flag) }}" alt="{{ $lang->code }}"  value="{{ $lang->code }}" />
            </li>
        @endforeach
        {!! Form::open(['method' => 'POST', 'route' => $route, 'id' => 'anakin-skywalker']) !!}
            {!! Form::hidden('language') !!}
        {!! Form::close() !!}
    </ul>
@endif
