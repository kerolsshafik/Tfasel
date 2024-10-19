@extends('layouts.app')

@section('title', 'View Article')

@section('content')
    <div class="container">
        <!-- Article Details -->
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <b>The Article</b>

                        <!-- Display article details in a table -->
                        <table class="table table-bordered">
                            <tbody>
                                <!-- Article Title in Arabic -->
                                <tr>
                                    <th scope="row">Title (Arabic)</th>
                                    <td>{{ $article->title_ar }}</td>
                                </tr>

                                <!-- Article Title in English -->
                                <tr>
                                    <th scope="row">Title (English)</th>
                                    <td>{{ $article->title_en }}</td>
                                </tr>

                                <!-- Article Content in Arabic -->
                                <tr>
                                    <th scope="row">Content (Arabic)</th>
                                    <td>{!! $article->content_ar !!}</td>
                                </tr>

                                <!-- Article Content in English -->
                                <tr>
                                    <th scope="row">Content (English)</th>
                                    <td>{!! $article->content_en !!}</td>
                                </tr>

                                <!-- Large Image -->
                                @if ($article->getFirstMedia('big_images'))
                                    <tr>
                                        <th scope="row">Large Image</th>
                                        <td>
                                            <img src="{{ $article->getFirstMediaUrl('big_images') }}" alt="Large Image"
                                                width="200px" class="img-fluid big-image">
                                        </td>
                                    </tr>
                                @endif

                                <!-- Small Images -->
                                @if ($article->getMedia('small_images')->count())
                                    <tr>
                                        <th scope="row">Small Images</th>
                                        <td>
                                            <div class="gap-2 d-flex">
                                                @foreach ($article->getMedia('small_images') as $image)
                                                    <img src="{{ $image->getUrl() }}" alt="Small Image" class="img-fluid"
                                                        style="width: 100px;">
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                                <!-- Videos -->
                                @if ($article->getMedia('videos')->count())
                                    <tr>
                                        <th scope="row">Videos</th>
                                        <td>
                                            @foreach ($article->getMedia('videos') as $video)
                                                <video width="320" height="240" controls class="mb-3">
                                                    <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
