@if(count($object))
    <div class="dd">
        <ol class="dd-list">
            @foreach($object as $node)
                @include('partials.admin.node', compact('resource', 'node'))
            @endforeach
        </ol>
    </div>
    <script>
        $(function () {
            $('.dd').nestable({
                callback: function(){
                    $.ajax({
                        type: 'POST',
                        url: '{{ isset($path) ? $path : route('admin.'. $resource .'.order') }}',
                        data: JSON.stringify($('.dd').nestable('asNestedSet')),
                        contentType: 'json',
                        headers: {
                            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                        },
                        error:  function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.status);
                            console.log(thrownError);
                        }
                    });
                }
            });
        });
    </script>
@else
    {{ trans('admin.empty') }}
@endif
