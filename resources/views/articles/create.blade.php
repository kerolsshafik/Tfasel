{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


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

            <!-- Title Field -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                    required>
            </div>

            <!-- Body Field -->
            <div class="form-group">
                <label for="content">content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
            </div>

            <!-- Category Field -->
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
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
    {{-- @endsection --}}
</body>

</html>
