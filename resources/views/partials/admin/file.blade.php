@if (!empty(trim($file)))
    <div class="uploaded-file">
        <a title="{{ trans('admin.fields.uploaded')  }}" href="{{ asset($file) }}" target="_blank">
            @fa('file', '4x')
        </a>
    </div>
@endunless
