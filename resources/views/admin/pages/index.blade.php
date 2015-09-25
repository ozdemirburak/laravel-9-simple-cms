@extends('layouts.admin')

@section('content')
    @if(count($pages))
        <div class="dd">
            <ol class="dd-list">
                @foreach($pages as $node)
                    {!! renderNode($node, "page") !!}
                @endforeach
            </ol>
        </div>
        <script>
            $(function () {
                $('.dd').nestable({
                    callback: function(){
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.page.order') }}',
                            data: JSON.stringify($('.dd').nestable('asNestedSet')),
                            contentType: "json",
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
@endsection