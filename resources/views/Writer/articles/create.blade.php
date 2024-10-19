@extends('layouts.app')

@section('title', 'Create New Article')

@section('content')

    <div class="container">
        <div class="row justify-content-end"> <!-- Align the column to the right -->
            <div class="col-lg-10 col-md-12 col-sm-12">
                <b>Create New Article</b>
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="title_ar">Title_AR</label>
                        <input type="text" class="form-control" id="title_ar" name="title_ar"
                            value="{{ old('title_ar') }}" required>
                        @error('title_ar')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <!-- Body Field -->
                    <div class="mb-3">
                        <label for="content_ar">content_AR</label>
                        <textarea class="form-control ckeditor" name="content_ar" rows="5" required>{{ old('content_ar') }}</textarea>
                    </div>
                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="title_en">Title_EN</label>
                        <input type="text" class="form-control" id="title_en" name="title_en"
                            value="{{ old('title_en') }}" required>
                        @error('title_en')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Body Field -->
                    <div class="mb-3">
                        <label for="content_en">content_EN</label>
                        <textarea class="form-control ckeditor" name="content_en" rows="5" required>{{ old('content_en') }}</textarea>
                    </div>

                    <!-- Category Field -->
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*"
                            required>

                        {{-- images --}}
                        @if ($errors->has('images'))
                            <div class="alert alert-danger">
                                {{ $message }}
                                {{ $errors->first('images') }}
                            </div>
                        @endif
                    </div>

                    <!-- Video Upload Field -->
                    <div class="mb-3">
                        <label for="videos">Videos (Upload videos in MP4, AVI, or MOV format)</label>
                        <input type="file" class="form-control" id="videos" name="videos[]" multiple accept="video/*">
                    </div>
                    @if ($errors->has('videos'))
                        <div class="alert alert-danger">
                            {{ $errors->first('images') }}
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Create Article</button>
                </form>
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
