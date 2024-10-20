@extends('layouts.app')

@section('title', 'users')

@section('content')
    @auth
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-10 col-md-12 col-sm-16">
                    <div class="card">
                        <div class="card-header">{{ __('users') }}</div>

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
                            <a href="{{ route('users.create') }}" class="mb-3 btn btn-primary">
                                <i class="fas fa-plus"></i> Create user
                            </a>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME (AR)</th>
                                            <th>email </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ Str::limit($user->name, 10) }}</td>
                                                <td>{{ Str::limit($user->email, 10) }}</td>

                                                <td>
                                                    <!-- Edit button for admin and writer -->
                                                    @if (Auth::user()->isAdmin())
                                                        <a href="{{ route('users.show', $user) }}" class="btn btn-info">
                                                            <i class="fas fa-show"></i> view
                                                        </a>
                                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <!-- Delete button for admin only -->
                                                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this article?');">
                                                                <i class="fas fa-trash-alt"></i> Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No users found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination links -->
                            <div class="mt-3">
                                {{ $users->links() }} <!-- Use the default pagination view -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection

@section('js')


@endsection
