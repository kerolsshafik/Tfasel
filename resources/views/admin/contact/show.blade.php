@extends('layouts.app')

@section('title', 'View contact')

@section('content')
    <div class="container">
        <!-- contact Details -->
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <b>The contact</b>

                        <!-- Display contact details in a table -->
                        <table class="table table-bordered">
                            <tbody>
                                <!-- contact Title in Arabic -->
                                <tr>
                                    <th scope="row">name</th>
                                    <td>{{ $contact->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">email</th>
                                    <td>{{ $contact->email }}</td>
                                </tr>

                                <!-- contact Title in English -->
                                <tr>
                                    <th scope="row">phone</th>
                                    <td>{{ $contact->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">subject</th>
                                    <td>{{ $contact->subject }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">message</th>
                                    <td>{{ $contact->message }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">created_at</th>
                                    <td>{{ $contact->created_at }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
