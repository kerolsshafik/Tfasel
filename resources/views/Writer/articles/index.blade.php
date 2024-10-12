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
                var url = "{{ route('writer.articles.delete', ':id') }}";
                url = url.replace(':id', articleId);
                $('#deleteModal').modal('show');
                $('#deleteForm').attr('action', url);
            });
        });
    </script>
@endpush
