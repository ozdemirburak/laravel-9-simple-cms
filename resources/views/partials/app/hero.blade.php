<section class="hero is-primary {{ $class ?? '' }}">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <h1 class="title">{{ $title }}</h1>
                    <h2 class="subtitle">{{ $description }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.app.errors')
