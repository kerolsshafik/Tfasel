@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Articles') }}</div>

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

                        <a href="{{ route('articles.create') }}" class="mb-3 btn btn-primary">
                            <i class="fas fa-plus"></i> Create Article
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
                                                <a href="{{ route('articles.show', $article) }}" class="btn btn-info">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this article?');">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No articles found.</td>
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
@endsection
