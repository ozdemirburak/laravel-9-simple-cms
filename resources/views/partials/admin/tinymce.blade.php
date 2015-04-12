<script src="{{ url( 'packages/tinymce/tinymce.min.js' ) }}" type="text/javascript"></script>
<script>
    tinymce.init({
        selector: "#content",
        theme: "modern",
        menubar : false,
        relative_urls: false,
        forced_root_block: false, // Start tinyMCE without any paragraph tag
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars media nonbreaking",
            "table contextmenu directionality paste textcolor"
        ],
        toolbar1: "bold italic underline hr | link unlink |  image media | forecolor backcolor  | bullist numlist outdent indent | code | preview | styleselect",
        entity_encoding: "raw"
    });
</script>