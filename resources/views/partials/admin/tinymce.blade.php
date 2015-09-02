<script src="{{ url( 'packages/tinymce/tinymce.min.js' ) }}" type="text/javascript"></script>
<script>
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        menubar : false,
        relative_urls: false,
        forced_root_block: false, // Start tinyMCE without any paragraph tag
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars media nonbreaking",
            "table contextmenu directionality paste textcolor localautosave"
        ],
        toolbar1: "localautosave | bold italic underline hr | link unlink image media | styleselect forecolor backcolor paste | bullist numlist outdent indent | preview ",
        entity_encoding: "raw",
        file_picker_callback : elFinderBrowser
    });

    function elFinderBrowser(callback, value, meta) {
        var request = "{{ route('elfinder.tinymce4') }}";
        tinymce.activeEditor.windowManager.open({
            title: '{{  trans('admin.elfinder') }}',
            url: request,
            width: 900,
            height: 450,
            resizable: 'yes'
        }, {
            setUrl: function (url) {
                callback(url);
            }
        });
        return false;
    }
</script>
