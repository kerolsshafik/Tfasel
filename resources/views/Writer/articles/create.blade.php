@extends('layouts.app')

@section('title')
    Articles
@endsection

@section('content')
    <div class="container">
        <h1>Articles</h1>
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif


                            <a href="{{ route('writer.articles.create') }}" class="btn btn-primary">Create Article</a>
                            <a href="{{ route('writer.articles.trashed') }}" class="btn btn-primary">View Deleted
                                Articles</a>
                            <a href="{{ route('writer.articles.trashed') }}" class="btn btn-primary">Restore Deleted
                                Articles</a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <th scope="row">{{ $article->id }}</th>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->content }}</td>
                                            <td>
                                                <a href="{{ route('writer.articles.edit', $article->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <button type="button" class="btn btn-danger delete"
                                                    data-id="{{ $article->id }}">Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                var articleId = $(this).data('id');
                var url = "{{ route('writer.ar
@extends('layouts.app')

@section('title')
    Create Article
@endsection

@section('content')

    <div class="container">
        <h2>Create New Article</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Category Field -->
            <div class="form-group">
                <label for="user_id">Users</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Select user</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Title Field -->
            <div class="form-group">
                <label for="title_ar">Title_AR</label>
                <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar') }}"
                    required>
            </div>

            <!-- Body Field -->
            <div class="form-group">
                <label for="content_ar">content_AR</label>
                <textarea class="form-control ckeditor" name="content_ar" rows="5" required>{{ old('content_ar') }}</textarea>
            </div>
            <!-- Title Field -->
            <div class="form-group">
                <label for="title_en">Title_EN</label>
                <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en') }}"
                    required>
            </div>

            <!-- Body Field -->
            <div class="form-group">
                <label for="content_en">content_EN</label>
                <textarea class="form-control ckeditor" name="content_en" rows="5" required>{{ old('content_en') }}</textarea>
            </div>

            <!-- Category Field -->
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name_en }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Image Upload Field -->
            <div class="form-group">
                <label for="images">Images (First image will be the main large image, others will be smaller)</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*"
                    required>
            </div>

            <!-- Video Upload Field -->
            <div class="form-group">
                <label for="videos">Videos (Upload videos in MP4, AVI, or MOV format)</label>
                <input type="file" class="form-control" id="videos" name="videos[]" multiple accept="video/*">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create Article</button>
        </form>
    </div>
@endsection

@push('js')
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
@endpush
ticles.delete', ':id') }}";
                url = url.replace(':id', articleId);
                $('#deleteModal').modal('show');
                $('#deleteForm').attr('action', url);
            });
        });
    </script>
@endpush
