@extends('layouts.app')

@section('title', 'contacts')

@section('content')
    @auth
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-10 col-md-12 col-sm-16">
                    <div class="card">
                        <div class="card-header">{{ __('contacts') }}</div>

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

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NAME </th>
                                            <th>Email </th>
                                            <th>Subject</th>
                                            <th>Message </th>
                                            <th>Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($contacts as $con)
                                            <tr>
                                                <td>{{ $con->name }}</td>
                                                <td>{{ $con->email }}</td>
                                                <td>{{ Str::limit($con->message, 10) }}</td>
                                                <td>{{ Str::limit($con->message, 20) }}</td>

                                                <td>
                                                    <!-- Edit button for admin and writer -->
                                                    @if (Auth::user()->isAdmin() || Auth::user()->isWriter())
                                                        <a href="{{ route('contacts.show', $con) }}" class="btn btn-primary">
                                                            <i class="fas fa-edit"></i> show
                                                        </a>
                                                    @endif

                                                    <!-- Delete button for admin only -->
                                                    @if (Auth::user()->isAdmin())
                                                        <form action="{{ route('contacts.destroy', $con) }}" method="POST"
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
                                                <td colspan="8" class="text-center">No contacts found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination links -->
                            <div class="mt-3">
                                {{ $contacts->links() }} <!-- Use the default pagination view -->
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
