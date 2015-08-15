@unless (trim($image) === "")
    <div class="uploaded-file">
        <strong>{{ trans('admin.fields.uploaded')  }}</strong>
        <img class="img-responsive" alt="" src="{!! $image  !!}" />
    </div>
@endunless
