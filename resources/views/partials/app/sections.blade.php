@section('title'){{ $title ?? getTitle() }}@endsection
@section('description'){{ $description ?? getDescription() }}@endsection
@section('image'){{ $image ?? getImage() }}@endsection
@section('facebook'){{ getFacebookShareLink($currentUrl ?? request()->url(), $title ?? getTitle()) }}@endsection
@section('twitter'){{ getTwitterShareLink($currentUrl ?? request()->url(), $title ?? getTitle()) }}@endsection
@section('robots'){{ $robots ?? getRobots() }}@endsection
