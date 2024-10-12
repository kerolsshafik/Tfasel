{{-- @extends('layouts.app') --}}

@section('content')
    <div class="container">
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->content }}</p>

        <!-- Display the large image -->
        @if ($article->getFirstMedia('big_images'))
            <img src="{{ $article->getFirstMediaUrl('big_images') }}" alt="Large Image" class="big-image">
        @endif

        <!-- Display the small images -->
        @if ($article->getMedia('small_images')->count())
            <div class="small-images">
                @foreach ($article->getMedia('small_images') as $image)
                    <img src="{{ $image->getUrl() }}" alt="Small Image" class="small-image">
                @endforeach
            </div>
        @endif

        <!-- Display the videos -->
        @if ($article->getMedia('videos')->count())
            <div class="videos">
                @foreach ($article->getMedia('videos') as $video)
                    <video width="320" height="240" controls>
                        <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">
                        Your browser does not support the video tag.
                    </video>
                @endforeach
            </div>
        @endif
    </div>
@endsection
