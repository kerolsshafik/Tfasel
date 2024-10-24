@extends('front.layout.app')

{{-- @section('title', 'Create New caregory') --}}

@section('content')
    <!-- Main Post Section Start -->
    <div class="py-5 container-fluid">
        <div class="container py-5">
            <div class="row g-4">
                <div class="mt-0 col-lg-7 col-xl-8">
                    <div class="overflow-hidden rounded position-relative">
                        <img src="img/news-1.jpg" class="rounded img-fluid img-zoomin w-100" alt="">
                        <div class="flex-wrap px-4 d-flex justify-content-center position-absolute"
                            style="bottom: 10px; left: 0;">
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> </a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> 3.5k Views</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> 05
                                Comment</a>
                            <a href="#" class="text-white link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                        </div>
                    </div>
                    <div class="py-3 border-bottom">
                        <a href="#" class="mb-0 display-4 text-dark link-hover">Lorem Ipsum is simply dummy text of
                            the printing</a>
                    </div>
                    <p class="mt-3 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                        a galley standard dummy text ever since the 1500s, when an unknown printer took a galley...
                    </p>
                    <div class="p-4 rounded bg-light">
                        <div class="news-2">
                            <h3 class="mb-4">Popular articale</h3>
                        </div>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="overflow-hidden rounded">
                                    <img src="img/news-2.jpg" class="rounded img-fluid img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <a href="#" class="h3">Stoneman Clandestine Ukrainian claims successes against
                                        Russian.</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock"> 06 minute read</i> </p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> 3.5k Views</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="p-4 pt-0 rounded bg-light">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="overflow-hidden rounded">
                                    <img src="img/news-3.jpg" class="rounded img-fluid img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <a href="#" class="mb-2 h4">Get the best speak market, news.</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock"> 06 minute read</i> </p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> 3.5k Views</i></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="img/news-3.jpg" class="rounded img-zoomin img-fluid w-100"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="#" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 minute read</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Views</i></small>
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
    <!-- Main Post Section End -->


    <!-- Latest News Start -->
    <div class="py-5 container-fluid latest-news">
        <div class="container py-5">
            <h2 class="mb-4">Latest News</h2>
            <div class="latest-news-carousel owl-carousel">
                <div class="latest-news-item">
                    <div class="rounded bg-light">
                        <div class="overflow-hidden rounded-top">
                            <img src="img/news-7.jpg" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="p-4 d-flex flex-column">
                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9,
                                    2024</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest News End -->



    <!-- Most Populer News Start -->
    <div class="py-5 container-fluid populer-news">
        <div class="container py-5">
            <div class="mb-4 tab-class">
                <div class="row g-4">
                    <div class="col-lg-8 col-xl-9">
                        <div class="mb-4 d-flex flex-column flex-md-row justify-content-md-between border-bottom">
                            <h1 class="mb-4">What’s New</h1>
                            <ul class="text-center nav nav-pills d-inline-flex">
                                <li class="mb-3 nav-item">
                                    <a class="py-2 d-flex bg-light rounded-pill active me-2" data-bs-toggle="pill"
                                        href="#tab-1">
                                        <span class="text-dark" style="width: 100px;">Sports</span>
                                    </a>
                                </li>
                                <!-- <li class="mb-3 nav-item">
                                                                <a class="py-2 d-flex bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-5">
                                                                    <span class="text-dark" style="width: 100px;">Fashion</span>
                                                                </a>
                                                            </li> -->
                            </ul>
                        </div>
                        <div class="mb-4 tab-content">
                            <div id="tab-1" class="p-0 tab-pane fade show active">
                                <div class="row g-4">
                                    <div class="col-lg-8">
                                        <div class="overflow-hidden rounded position-relative">
                                            <img src="img/news-1.jpg" class="rounded img-zoomin img-fluid w-100"
                                                alt="">
                                            <div class="px-4 py-2 text-white rounded position-absolute bg-primary"
                                                style="top: 20px; right: 20px;">
                                                Sports
                                            </div>
                                        </div>
                                        <div class="my-4">
                                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of the
                                                printing and typesetting industry.</a>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="text-dark link-hover me-3"><i
                                                    class="fa fa-clock"></i> 06 minute read</a>
                                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i>
                                                3.5k Views</a>
                                            <a href="#" class="text-dark link-hover me-3"><i
                                                    class="fa fa-comment-dots"></i> 05 Comment</a>
                                        </div>
                                        <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has
                                            been the industry's standard dummy..
                                        </p>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center">
                                                    <div class="col-5">
                                                        <div class="overflow-hidden rounded">
                                                            <img src="img/news-3.jpg"
                                                                class="rounded img-zoomin img-fluid w-100" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="features-content d-flex flex-column">
                                                            <p class="mb-2 text-uppercase">Sports</p>
                                                            <a href="#" class="h6">Get the best speak market,
                                                                news.</a>
                                                            <small class="text-body d-block"><i
                                                                    class="fas fa-calendar-alt me-1"></i> Dec 9,
                                                                2024</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div id="tab-5" class="p-0 tab-pane fade show">
                                                            <div class="row g-4">
                                                                <div class="col-lg-8">
                                                                    <div class="overflow-hidden rounded position-relative">
                                                                        <img src="img/news-1.jpg" class="rounded img-zoomin img-fluid w-100" alt="">
                                                                        <div class="px-4 py-2 text-white rounded position-absolute bg-primary" style="top: 20px; right: 20px;">
                                                                            Fashion
                                                                        </div>
                                                                    </div>
                                                                    <div class="my-3">
                                                                        <a href="#" class="h4">World Happiness Report 2023: What's the highway to happiness?</a>
                                                                    </div>
                                                                    <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy
                                                                    </p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 minute read</a>
                                                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                                                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                                                                        <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="row g-4">
                                                                        <div class="col-12">
                                                                            <div class="row g-4 align-items-center">
                                                                                <div class="col-5">
                                                                                    <div class="overflow-hidden rounded">
                                                                                        <img src="img/news-3.jpg" class="rounded img-zoomin img-fluid w-100" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <div class="features-content d-flex flex-column">
                                                                                        <p class="mb-2 text-uppercase">Fashion</p>
                                                                                        <a href="#" class="h6">Get the best speak market, news.</a>
                                                                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                        </div>
                    </div>


                    <div class="mb-4 border-bottom">
                        <h2 class="my-4">Most Views News</h2>
                    </div>
                    <div class="whats-carousel owl-carousel">
                        <div class="latest-news-item">
                            <div class="rounded bg-light">
                                <div class="overflow-hidden rounded-top">
                                    <img src="img/news-7.jpg" class="img-zoomin img-fluid rounded-top w-100"
                                        alt="">
                                </div>
                                <div class="p-4 d-flex flex-column">
                                    <a href="#" class="h4">There are many variations of passages of Lorem Ipsum
                                        available,</a>
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="small text-body link-hover">by Willium Smith</a>
                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9,
                                            2024</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="whats-item">
                            <div class="rounded bg-light">
                                <div class="overflow-hidden rounded-top">
                                    <img src="img/news-6.jpg" class="img-zoomin img-fluid rounded-top w-100"
                                        alt="">
                                </div>
                                <div class="p-4 d-flex flex-column">
                                    <a href="#" class="h4">There are many variations of passages of Lorem Ipsum
                                        available,</a>
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="small text-body link-hover">by Willium Smith</a>
                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9,
                                            2024</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Most Populer News End -->
@endsection
