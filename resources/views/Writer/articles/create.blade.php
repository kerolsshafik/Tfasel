@extends('layouts.app')

@section('title', 'Create New Article')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 15px;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .chat-window {
            display: none;
            /* Initially hidden */
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 300px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .chat-header {
            background: #007bff;
            color: white;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .chat-messages {
            max-height: 300px;
            overflow-y: auto;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .chat-message {
            margin: 5px 0;
        }

        .chat-input {
            display: flex;
            padding: 10px;
        }

        .chat-input input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .chat-input button {
            margin-left: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
        }
    </style>

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

                    <div class="mb-3">
                        <label for="description_ar">description_ar</label>
                        <input type="text" class="form-control" id="description_ar" name="description_ar"
                            value="{{ old('description_ar') }}" required>
                        @error('description_ar')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description_en">description_en</label>
                        <input type="text" class="form-control" id="description_en" name="description_en"
                            value="{{ old('description_en') }}" required>
                        @error('description_en')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
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

                        @if ($errors->has('images'))
                            <div class="alert alert-danger">
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
                            {{ $errors->first('videos') }}
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Create Article</button>
                </form>

                <!-- Chat Icon -->
                <div>
                    <button class="chat-icon"><i class="fas fa-comment"></i> Chat</button>
                </div>

                <!-- Chat Icon and Window -->
                <button class="chat-icon"><i class="fas fa-comment"></i> Chat</button>


                <!-- Chat Window -->
                <div class="chat-window" style="display: none;">
                    <div class="chat-header">
                        <h4>Chat with Us</h4>
                    </div>
                    <div class="chat-messages" style="height: 200px; overflow-y: auto;"></div>
                    <div class="messages">
                        <div class="left message">
                            <p>Start chatting!</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <form id="chat-form">
                            <input type="text" id="message" name="message" placeholder="Enter message..."
                                autocomplete="off">
                            <button type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle chat window
            $(".chat-icon").click(function() {
                $(".chat-window").toggle();
            });

            // Handle chat form submission
            $("#chat-form").submit(function(event) {
                event.preventDefault();
                let content = $("#message").val().trim();
                if (content === '') return;
                // Disable input and button
                $("#message").prop('disabled', true);
                $("button[type='submit']").prop('disabled', true);
                $.ajax({
                    url: "{{ route('chat') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        "model": "gpt-3.5-turbo",
                        "content": content
                    }
                }).done(function(response) {
                    // Display sent message
                    $(".messages").append('<div class="right message"><p>' + content +
                        '</p></div>');
                    // Display response message
                    $(".messages").append('<div class="left message"><p>' + response.message +
                        '</p></div>');
                    // Reset input and re-enable form
                    $("#message").val('');
                    $("#message").prop('disabled', false);
                    $("button[type='submit']").prop('disabled', false);
                    $(".chat-messages").scrollTop($(".chat-messages")[0].scrollHeight);
                }).fail(function() {
                    alert("An error occurred. Please try again.");
                    $("#message").prop('disabled', false);
                    $("button[type='submit']").prop('disabled', false);
                });
            });

            // Enter key to send message
            $("#message").keypress(function(event) {
                if (event.which === 13) {
                    $("#chat-form").submit();
                }
            });
        });
    </script>


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
