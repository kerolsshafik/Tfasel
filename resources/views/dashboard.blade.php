<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="container" style="width:80%">
        <div class="row justify-content-center">

            <div class="flex-1 p-4">
                <main class="flex-1 p-6">
                    <h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Welcome to Your Dashboard</h1>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">Here you can manage your settings and preferences.
                    </p>
                    <!-- Add more content here -->
                </main>
                @yield('main-content')
            </div>
        </div>
    </div>
@endsection
