@if(count($languages))
    <ul class="languages text-center">
        @foreach($languages as $lang)
            <li>
                <img class="img-circle chosen-one" title="{{ $lang->title }}"
                     src="{{ url($lang->flag) }}" alt="{{ $lang->code }}"  value="{{ $lang->code }}" />
            </li>
        @endforeach
        {!! Form::open(['method' => 'POST', 'route' => 'admin.language.change', 'id' => 'anakin-skywalker']) !!}
        {!! Form::hidden('language') !!}
        {!! Form::close() !!}
    </ul>

    <script>
        $('img.chosen-one').click(function(){
            $('input[name="language"]').val($(this).attr("alt"));
            $('#anakin-skywalker').submit();
        });
    </script>
@endif