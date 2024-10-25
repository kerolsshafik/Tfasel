@extends('front.layout.app')

{{-- @section('title', 'Create New caregory') --}}

@section('content')
    <!-- Main Post Section Start -->
    <div class="py-5 container-fluid">
        <div class="container py-5">
            <div class="row g-4">
                <div class="mt-0 col-lg-7 col-xl-8">
                    <div class="first">
                        <div class="overflow-hidden rounded position-relative">
                            <img src="{{ $first->getFirstMediaUrl('big_images') }}" class="rounded img-fluid img-zoomin"
                                height="300px" style="width: auto;" alt="">
                            <div class="flex-wrap px-4 d-flex justify-content-center position-absolute"
                                style="bottom: 10px; left: 0;">
                                <a href="#"class="text-white me-3 link-hover"><i class="fa fa-clock"></i>
                                    {{ $first->created_at }} </a>
                                <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i>
                                    {{ $first->count }}
                                    Views</a>
                            </div>
                        </div>
                        <div class="py-3 border-bottom">
                            <a href="{{ route('Tafasel.show_article', $first) }}"
                                class="mb-0 display-4 text-dark link-hover">{{ $first->title_en }}</a>
                        </div>
                        <p class="mt-3 mb-4">{{ $first->description_en }}
                    </div>
                    <div class="p-4 rounded bg-light">
                        <div class="news-2">
                            <h3 class="mb-4">Popular articale</h3>
                        </div>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="overflow-hidden rounded">
                                    <img src="{{ $popular->getFirstMediaUrl('big_images') }}"height="110px" width="110px"
                                        class="rounded img-fluid img-zoomin" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <a href="{{ route('Tafasel.show_article', $popular) }}"
                                        class="h3">{{ $popular->title_en }}.</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock">
                                            {{ $popular->created_at->format(' D/ h:i') }}</i> </p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> {{ $popular->count }} Views</i></p>
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
                                    <img src="{{ $randoms[1]->getFirstMediaUrl('big_images') }}"height="100px"
                                        width="100px" class="rounded img-fluid img-zoomin" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <a href="{{ route('Tafasel.show_article', $randoms[1]) }}"
                                        class="mb-2 h4">{{ Str::limit($randoms[1]->description_ar, 100) }}</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock">
                                            {{ $randoms[1]->created_at->format('D/ h:i') }}</i></p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> {{ $randoms[1]->count }} Views</i></p>
                                </div>
                            </div>
                            @foreach ($randoms as $index => $random)
                                @if ($index > 0)
                                    <!-- Skip the first article since it's already displayed -->
                                    <div class="col-12">
                                        <div class="row g-4 align-items-center">
                                            <div class="col-5">
                                                <div class="overflow-hidden rounded">
                                                    <img src="{{ $random->getFirstMediaUrl('big_images') }}" height="80px"
                                                        width="80px" class="rounded img-zoomin img-fluid" alt="">
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="features-content d-flex flex-column">
                                                    <a href="{{ route('Tafasel.show_article', $random) }}"
                                                        class="h6">{{ Str::limit($random->description_ar, 100) }}</a>
                                                    <small><i
                                                            class="fa fa-clock">{{ $random->created_at->format('D/ h:i') }}</i></small>
                                                    <small><i class="fa fa-eye"> {{ $random->count }} Views</i></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
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
                @foreach ($limit as $item)
                    <div class="latest-news-item">
                        <div class="rounded bg-light">
                            <div class="overflow-hidden rounded-top">
                                <img src="{{ $random->getFirstMediaUrl('big_images') }}" height="80px" width="100px"
                                    class="img-zoomin img-fluid rounded-top " alt="">
                            </div>
                            <div class="p-4 d-flex flex-column">
                                <a href="{{ route('Tafasel.show_article', $item) }}"
                                    class="h4">{{ Str::limit($item->title_ar, 25) }}...</a>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('Tafasel.show_article', $item) }}"
                                        class="small text-body link-hover">by {{ $item->user->name }}</a>
                                    <small class="text-body d-block"><i
                                            class="fas fa-calendar-alt me-1"></i>{{ $item->created_at->format('M  d,Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                <li class="mb-3 nav-item">
                                    <a class="py-2 d-flex bg-light rounded-pill me-2" data-bs-toggle="pill"
                                        href="#tab-5">
                                        <span class="text-dark" style="width: 100px;">Fashion</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-4 tab-content">
                            <div id="tab-1" class="p-0 tab-pane fade show active">
                                <div class="row g-4">
                                    <div class="col-lg-4">
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center">
                                                    <div class="col-5">
                                                        <div class="overflow-hidden rounded">
                                                            <img src="img/news-3.jpg" class="rounded img-zoomin img-fluid"
                                                                alt="">
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
                                    <div class="col-lg-4">
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center">
                                                    <div class="col-5">
                                                        <div class="overflow-hidden rounded">
                                                            <img src="img/news-3.jpg" class="rounded img-zoomin img-fluid"
                                                                alt="">
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
                            <div id="tab-5" class="p-0 tab-pane fade show">
                                <div class="row g-4">
                                    <div class="col-lg-8">
                                        <div class="overflow-hidden rounded position-relative">
                                            <img src="img/news-1.jpg" class="rounded img-zoomin img-fluid"
                                                alt="">
                                            <div class="px-4 py-2 text-white rounded position-absolute bg-primary"
                                                style="top: 20px; right: 20px;">
                                                Fashion
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <a href="#" class="h4">World Happiness Report 2023: What's the
                                                highway to happiness?</a>
                                        </div>
                                        <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has
                                            been the industry's standard dummy
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <a href="#" class="text-dark link-hover me-3"><i
                                                    class="fa fa-clock"></i> 06 minute read</a>
                                            <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i>
                                                3.5k Views</a>
                                            <a href="#" class="text-dark link-hover me-3"><i
                                                    class="fa fa-comment-dots"></i> 05 Comment</a>
                                            <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i>
                                                1.5k Share</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center">
                                                    <div class="col-5">
                                                        <div class="overflow-hidden rounded">
                                                            <img src="img/news-3.jpg" class="rounded img-zoomin img-fluid"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="features-content d-flex flex-column">
                                                            <p class="mb-2 text-uppercase">Fashion</p>
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
                        </div>
                    </div>


                    <div class="mb-4 border-bottom">
                        <h2 class="my-4">Most Views News</h2>
                    </div>
                    <div class="whats-carousel owl-carousel">
                        @foreach ($news as $new)
                            <div class="latest-news-item">
                                <div class="whats-item">
                                    <div class="rounded bg-light">
                                        <div class="overflow-hidden rounded-top">
                                            <img src="{{ $new->getFirstMediaUrl('big_images', 'default.jpg') }}"
                                                class="img-zoomin img-fluid rounded-top" alt="{{ $new->title_ar }}">
                                        </div>
                                        <div class="p-4 d-flex flex-column">
                                            <a href="{{ route('Tafasel.show_article', $new) }}"
                                                class="h4">{{ Str::limit($new->description_ar, 80) }}</a>
                                            <div class="d-flex justify-content-between">
                                                <a
                                                    href="{{ route('Tafasel.show_article', $new) }}"class="small text-body link-hover">by
                                                    {{ $new->user->name ?? 'Unknown' }}</a>
                                                <small class="text-body d-block">
                                                    <i class="fas fa-calendar-alt me-1"></i>
                                                    {{ $new->created_at->format('M d, Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!-- Most Populer News End -->
    @endsection
