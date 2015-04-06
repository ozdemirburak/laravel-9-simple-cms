@if ($errors->any())
    <div class="alert alert-danger validation">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
        @endforeach
    </div>
@endif