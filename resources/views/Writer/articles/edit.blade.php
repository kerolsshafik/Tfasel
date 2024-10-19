@extends('layouts.app')

@section('title', 'Update Article')

@section('content')
    <div class="container">
        <div class="row justify-content-end"> <!-- Align the column to the right -->
            <div class="col-lg-10 col-md-12 col-sm-12">
                <b>Update Article</b>
                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title Field (Arabic) -->
                    <div class="mb-3">
                        <label for="title_ar">Title (Arabic)</label>
                        <input type="text" class="form-control" id="title_ar" name="title_ar"
                            value="{{ $article->title_ar }}" required>
                        @error('title_ar')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Body Field (Arabic) -->
                    <div class="mb-3">
                        <label for="content_ar">Content (Arabic)</label>
                        <textarea class="form-control ckeditor" name="content_ar" rows="5" required>{{ $article->content_ar }}</textarea>
                    </div>

                    <!-- Title Field (English) -->
                    <div class="mb-3">
                        <label for="title_en">Title (English)</label>
                        <input type="text" class="form-control" id="title_en" name="title_en"
                            value="{{ $article->title_en }}" required>
                        @error('title_en')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Body Field (English) -->
                    <div class="mb-3">
                        <label for="content_en">Content (English)</label>
                        <textarea class="form-control ckeditor" name="content_en" rows="5" required>{{ $article->content_en }}</textarea>
                    </div>

                    <!-- Category Field -->
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_en }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Image Upload Field -->
                    <div class="mb-3">
                        <label for="images">Images (First image will be the main large image, others will be
                            smaller)</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">

                        @if ($errors->has('images'))
                            <div class="alert alert-danger">
                                {{ $errors->first('images') }}
                            </div>
                        @endif
                    </div>

                    @if ($article->getFirstMedia('big_images'))
                        <div class="mb-3">
                            <label>Large Image</label>
                            <img src="{{ $article->getFirstMediaUrl('big_images') }}" alt="Large Image" width="200px"
                                class="img-fluid big-image">
                        </div>
                    @endif

                    <!-- Small Images -->
                    @if ($article->getMedia('small_images')->count())
                        <div class="mb-3">
                            <label>Small Images</label>
                            <div class="gap-2 d-flex">
                                @foreach ($article->getMedia('small_images') as $image)
                                    <img src="{{ $image->getUrl() }}" alt="Small Image" class="img-fluid"
                                        style="width: 100px;">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Video Upload Field -->
                    <div class="mb-3">
                        <label for="videos">Videos (Upload videos in MP4, AVI, or MOV format)</label>
                        <input type="file" class="form-control" id="videos" name="videos[]" multiple accept="video/*">

                        @if ($article->getMedia('videos')->count())
                            <div class="mb-3">
                                <label>Videos</label>
                                @foreach ($article->getMedia('videos') as $video)
                                    <video width="320" height="240" controls class="mb-3">
                                        <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">
                                        Your browser does not support the video tag.
                                    </video>
                                @endforeach
                            </div>
                        @endif

                        @if ($errors->has('videos'))
                            <div class="alert alert-danger">
                                {{ $errors->first('videos') }}
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.querySelectorAll('textarea.ckeditor').forEach((editorEl) => {
            ClassicEditor
                .create(editorEl)
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        // Update the hidden textarea with the data from CKEditor
                        editorEl.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
