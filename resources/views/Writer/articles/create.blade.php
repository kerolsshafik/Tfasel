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
                        <textarea class="form-control ckeditor ck" name="content_ar" rows="5" required>{{ old('content_ar') }}</textarea>
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
                        <textarea class="form-control ckeditor ck2" name="content_en" rows="5" required>{{ old('content_en') }}</textarea>
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
                {{-- <div>

                </div> --}}

                <!-- Chat Icon and Window -->
                {{-- <button class="chat-icon"><i class="fas fa-comment"></i> Chat</button> --}}


                <!-- Chat Window -->
                {{-- <div class="chat-window" style="display: none;">
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
                 </div> --}}

                <!-- Chat Button -->
                <button id="chatButton" class="chat-icon"><i class="fas fa-comment"></i> Chat</button>

                <!-- Chat Pop-up -->
                <!-- Chat Pop-up -->
                <div id="chatPopup"
                    style="display: none; position: fixed; bottom: 70px; right: 20px; width: 300px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 5px; padding: 15px;">
                    <div id="chatMessages" style="height: 200px; overflow-y: scroll; margin-bottom: 10px;"></div>
                    <input type="text" id="userMessage" placeholder="Type a message..."
                        style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                    <button onclick="sendMessage()"
                        style="margin-top: 5px; width: 100%; padding: 8px; background-color: #007bff; color: white; border: none; border-radius: 5px;">Send</button>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('js')

    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Toggle chat popup visibility
        document.getElementById("chatButton").onclick = function() {
            const chatPopup = document.getElementById("chatPopup");
            chatPopup.style.display = chatPopup.style.display === "none" ? "block" : "none";
        };

        // Send message to ChatGPT API
        async function sendMessage() {
            const userMessage = document.getElementById("userMessage").value.trim();
            const chatMessages = document.getElementById("chatMessages");

            if (!userMessage) return; // Exit if input is empty

            // Display user message
            const userDiv = document.createElement("div");
            userDiv.textContent = `You: ${userMessage}`;
            userDiv.style.marginBottom = "5px";
            chatMessages.appendChild(userDiv);

            document.getElementById("userMessage").value = ""; // Clear input

            // Send message to ChatGPT API using axios
            try {
                const response = await axios.post('/chat', {
                    message: userMessage
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                });

                const reply = response.data.choices[0].message.content;

                // Display ChatGPT response
                const botDiv = document.createElement("div");
                botDiv.textContent = `ChatGPT: ${reply}`;
                botDiv.style.marginBottom = "5px";
                botDiv.style.color = "#007bff";
                chatMessages.appendChild(botDiv);

                // Scroll to the bottom
                chatMessages.scrollTop = chatMessages.scrollHeight;
            } catch (error) {
                console.error("Error communicating with ChatGPT:", error);
            }
        }
    </script>
    {{-- <script>
        document.getElementById("chatButton").onclick = function() {
            const chatPopup = document.getElementById("chatPopup");
            chatPopup.style.display = chatPopup.style.display === "none" ? "block" : "none";
        };

        async function sendMessage() {
            const userMessage = document.getElementById("userMessage").value;
            const chatMessages = document.getElementById("chatMessages");

            if (!userMessage.trim()) return;

            // Display user message
            const userDiv = document.createElement("div");
            userDiv.textContent = `You: ${userMessage}`;
            chatMessages.appendChild(userDiv);

            document.getElementById("userMessage").value = ""; // Clear input

            // Send message to ChatGPT API using axios
            try {
                const response = await axios.post('/chat', {
                    message: userMessage
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                });

                const reply = response.data.choices[0].message.content;

                const botDiv = document.createElement("div");
                botDiv.textContent = `ChatGPT: ${reply}`;
                chatMessages.appendChild(botDiv);

                // Scroll to the bottom
                chatMessages.scrollTop = chatMessages.scrollHeight;
            } catch (error) {
                console.error("Error communicating with ChatGPT:", error);
            }
        }
    </script> --}}



    <script>
        document.querySelectorAll('.ck, .ck2').forEach((editorEl) => {

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
