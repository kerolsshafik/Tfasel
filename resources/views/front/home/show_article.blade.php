@extends('front.layout.app')

@section('title')
    Show Article
@endsection

@section('content')

    <div class="container my-4">
        <h2 class="mb-4">{{ $article->title_en }}</h2>
        <div class="row">
            <div class="col-md-6">
                <!-- Main Image Display -->
                <div class="mb-3 border rounded">
                    <!-- Large Image -->
                    @if ($article->getFirstMedia('big_images'))
                        <img id="mainImage" src="{{ $article->getFirstMediaUrl('big_images') }}" class="img-fluid rounded-top"
                            alt="Post Image" style="max-height: 400px; width: 100%; object-fit: cover;">
                    @endif
                </div>
                <!-- Image Descriptions -->
                <p id="mainDescription" class="text-muted">Click on a thumbnail to see the description.</p>

                <!-- Small  -->
                <p class="mb-0 fs-5"><i class="fa fa-clock">
                        {{ $article->created_at->format(' D/ h:i') }}</i> </p>
                <p class="mb-0 fs-5"><i class="fa fa-eye"> {{ $article->count }} Views</i></p>
            </div>
            <div class="col-md-6">
                <!-- Thumbnails for Swapping -->
                <div class="row">
                    <!-- Small Images -->
                    @if ($article->getMedia('small_images')->count())
                        @foreach ($article->getMedia('small_images') as $image)
                            <div class="mb-2 col-4">
                                <img src="{{ $image->getUrl() }}" class="img-fluid img-thumbnail thumbnail"
                                    alt="Image Thumbnail" style="height: 100px; width: auto;"
                                    data-image-url="{{ $image->getUrl() }}"
                                    data-description="Description for {{ $image->file_name }}">
                            </div>
                        @endforeach
                    @else
                        <p class="text-danger">No small images available.</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- Videos -->
        @if ($article->getMedia('videos')->count())
            <div class="mb-4 row">
                <div class="col-md-6">
                    @foreach ($article->getMedia('videos') as $video)
                        <div class="mb-3">
                            <video controls class="rounded w-100">
                                <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! $article->content_en !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Swap image and description when a thumbnail is clicked
            document.querySelectorAll('.thumbnail').forEach(function(thumbnail) {
                thumbnail.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent link behavior
                    // Get image and description from the clicked thumbnail
                    var imageUrl = this.getAttribute('data-image-url');
                    var imageDescription = this.getAttribute('data-description');
                    // Update main image and description
                    document.getElementById('mainImage').setAttribute('src', imageUrl);
                    document.getElementById('mainDescription').textContent = imageDescription;
                });
            });
        });
    </script>
@endsection

<style>
    .img-thumbnail {
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .img-thumbnail:hover {
        transform: scale(1.05);
    }

    video {
        width: 100%;
        height: auto;
    }
</style>
