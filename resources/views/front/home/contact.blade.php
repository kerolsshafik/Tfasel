@extends('front.layout.app')

@section('title')
    Contact
@endsection

@section('content')
    <!-- Contact Us Start -->
    <div class="py-5 container-fluid">
        <div class="container py-5">
            <h2>Contact Us</h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="p-5 rounded bg-light">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <h1 class="mb-4">General Customer Care & Technical Support</h1>
                        <p class="mb-4">The contact form is currently inactive.</p>
                        <div class="rounded">
                            <iframe class="rounded w-100" style="height: 425px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55210.83977589319!2d31.1441448!3d30.013114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458469235579697%3A0x4e91d61f9878fc52!2sGiza%2C%20El%20Omraniya%2C%20Giza%20Governorate!5e0!3m2!1sen!2seg!4v1698147104801!5m2!1sen!2seg"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form action="{{ route('Tafasel.submit') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <input type="text" class="py-3 border-0 w-100 form-control" name="name"
                                        placeholder="Your Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" class="py-3 border-0 w-100 form-control" name="email"
                                        placeholder="Enter Your Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="py-3 border-0 w-100 form-control" name="phone"
                                        placeholder="Enter Your Phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="py-3 border-0 w-100 form-control" name="subject"
                                        placeholder="Subject" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="border-0 w-100 form-control" rows="6" placeholder="Your Message" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="py-3 w-100 btn btn-primary form-control" type="submit">Submit
                                        Now</button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-4 row g-4">
                            <div class="col-xl-6">
                                <div class="p-4 bg-white rounded d-flex">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Address</h4>
                                        <p class="mb-0">Giza, Big Cairo</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="p-4 bg-white rounded d-flex">
                                    <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Mail Us</h4>
                                        <p class="mb-0">TFASEL@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="p-4 bg-white rounded d-flex">
                                    <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Telephone</h4>
                                        <p class="mb-0">(+012) 222222222</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="p-4 bg-white rounded d-flex">
                                    <i class="fa fa-share-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Share</h4>
                                        <div class="d-flex">
                                            <a class="me-3" href="#"><i
                                                    class="fab fa-twitter text-dark link-hover"></i></a>
                                            <a class="me-3" href="#"><i
                                                    class="fab fa-facebook-f text-dark link-hover"></i></a>
                                            <a class="me-3" href="#"><i
                                                    class="fab fa-youtube text-dark link-hover"></i></a>
                                            <a class="" href="#"><i
                                                    class="fab fa-linkedin-in text-dark link-hover"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us End -->
@endsection
