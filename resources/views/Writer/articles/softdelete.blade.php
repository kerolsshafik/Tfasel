@extends('layouts.app')

@section('title', 'Deleted Articles')

@section('content')
    @auth
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-10 col-md-12 col-sm-16">
                    <div class="card">
                        <div class="card-header">{{ __(' Deleted Articles') }}</div>

                        <div class="card-body">
                            <!-- Success and error messages -->
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close " data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <!-- Create Article Button -->
                            <a href="{{ route('articles.restoreall') }}" class="mb-3 btn btn-primary">
                                <i class="fas fa-plus"></i> Restore All
                            </a>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title (AR)</th>
                                            <th>Title (EN)</th>
                                            <th>Content (AR)</th>
                                            <th>Content (EN)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($articles as $article)
                                            <tr>
                                                <td>{{ $article->id }}</td>
                                                <td>{{ Str::limit($article->title_ar, 10) }}</td>
                                                <td>{{ Str::limit($article->title_en, 10) }}</td>
                                                <td>{{ Str::limit($article->content_ar, 20) }}</td>
                                                <td>{{ Str::limit($article->content_en, 20) }}</td>
                                                <td>

                                                    <!-- Delete button for admin only -->
                                                    <form action="{{ route('articles.restore', $article->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-success"
                                                            onclick="return confirm('Are you sure you want to restore this article?');">
                                                            <i class="fas fa-trash-alt"></i> restore
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No articles found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination links -->
                            <div class="mt-3">
                                {{ $articles->links() }} <!-- Use the default pagination view -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection

@section('js')
    <script>
        function togglePublish(articleId, is_published) {
            alert();
            let newStatus = is_published ? 0 : 1; // Toggle status
            $.ajax({
                url: `/articles/${articleId}/toggle-publish`,
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    is_published: newStatus
                },
                success: function(response) {
                    location.reload(); // Reload the page to see the updated status
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                }
            });

            // axios.put('/api/articles/' + id, {
            //     is_published: !is_published
            // }).then(response => {
            //     console.log(response.data);
            //     // Update the checkbox value
            //     document.getElementById('is_published').checked = !is_published;
            // }).catch(error => {
            //     console.error(error);
            // });
        }

        function toggleUpdate(articleId, is_updated) {
            let newStatus = is_updated ? 0 : 1; // Toggle status
            $.ajax({
                url: `/articles/${articleId}/toggle-update`,
                type: 'PATCH',
                data: {
                    _token: '{{ csrf_token() }}',
                    is_updated: newStatus
                },
                success: function(response) {
                    location.reload(); // Reload the page to see the updated status
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                }
            });

        }
    </script>

@endsection
