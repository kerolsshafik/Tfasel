@extends('layouts.app')

@section('title', 'View user')

@section('content')
    <div class="container">
        <!-- Article Details -->
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <b>The user</b>

                        <!-- Display article details in a table -->
                        <table class="table table-bordered">
                            <tbody>
                                <!-- Article Title in Arabic -->
                                <tr>
                                    <th scope="row">id</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>

                                <!-- user Title in English -->
                                <tr>
                                    <th scope="row">email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
