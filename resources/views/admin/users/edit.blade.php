@extends('layouts.app')

@section('title', 'Update caregory')

@section('content')
    <div class="container">
        <div class="row justify-content-end"> <!-- Align the column to the right -->
            <div class="col-lg-10 col-md-12 col-sm-12">
                <b>Update caregory</b>
                <form action="{{ route('categories.update', $caregory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title Field (Arabic) -->
                    <div class="mb-3">
                        <label for="name_ar">Name (Arabic)</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar"
                            value="{{ $caregory->name_ar }}" required>
                        @error('name_ar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name_en">Name (Arabic)</label>
                        <input type="text" class="form-control" id="name_en" name="name_en"
                            value="{{ $caregory->name_en }}" required>
                        @error('name_en')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update caregory</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
