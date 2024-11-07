@extends('layouts.app')

@section('title', 'Update user')

@section('content')
    <div class="container">
        <div class="row justify-content-end"> <!-- Align the column to the right -->
            <div class="col-lg-10 col-md-12 col-sm-12">
                <b>Update user</b>
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title Field  -->
                    <div class="mb-3">
                        <label for="name">Name </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">email </label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}"
                            required>
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update user</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
