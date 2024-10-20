@extends('layouts.app')

@section('title', 'Create New caregory')

@section('content')

    <div class="container">
        <div class="row justify-content-end"> <!-- Align the column to the right -->
            <div class="col-lg-10 col-md-12 col-sm-12">
                <b>Create New caregory</b>
                <hr>
                <br>
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="title_ar">name_AR</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}"
                            required>
                        @error('name_ar')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- name Field -->
                    <div class="mb-3">
                        <label for="name_en">name_en</label>
                        <input type="text" class="form-control" id="name_en" name="name_en"
                            value="{{ old('name_en') }}" required>
                        @error('name_en')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Create caregory</button>
                </form>
            </div>
        @endsection
        @section('js')

            {{-- <script>
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
            </script> --}}
        @endsection
