<!-- Navbar start -->
<div class="px-0 container-fluid sticky-top">
    <div class="container-fluid bg-light">
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl">
                <a href="{{ route('Tafasel.home') }}" class="mt-3 navbar-brand">
                    {{-- <p class="mb-2 text-primary display-6" style="line-height: 0;">Newsers</p>
                    <small class="text-body fw-normal" style="letter-spacing: 12px;">Nespaper</small>
                </a> --}}
                    <img src="{{ asset('img/logo3.jpg') }}" decoding="async" class="img-zoomin img-fluid" alt=""
                        style="height: 80px; width: 200px;">
                </a>
                <button class="px-3 py-2 navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="py-3 collapse navbar-collapse bg-light" id="navbarCollapse">
                    <div class="mx-auto navbar-nav border-top">
                        <a href="{{ route('Tafasel.home') }}" class="nav-item nav-link ">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                            <div class="m-0 dropdown-menu bg-secondary rounded-0">
                                @foreach ($categories as $category)
                                    <a href="{{ route('Tafasel.news', $category) }}"
                                        class="dropdown-item">{{ $category->name_en }}</a>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{ route('Tafasel.showcontact') }}" class="nav-item nav-link">Contact Us</a>
                    </div>
                    <div class="pt-3 d-flex flex-nowrap border-top pt-xl-0">
                        <div class="d-flex">
                            {{-- <img src="img/weather-icon.png" class="img-fluid w-100 me-2" alt=""> --}}
                            <div class="d-flex align-items-center">
                                {{-- <strong class="fs-4 text-secondary">31°C</strong> --}}
                                <div class="d-flex flex-column ms-2" style="width: 150px;">
                                    <span class="text-warning">cairo,</span>
                                    <small class="text-warning">{{ $currentDateTime->format('D. d M Y') }}</small>
                                </div>
                            </div>
                        </div>
                        {{-- <button
                            class="my-auto bg-white border btn-search btn border-warning btn-md-square rounded-circle"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-dark"></i></button> --}}
                        {{-- <div> <a href="{{ route('Tafasel.login') }}"
                                class="btn btn-outline-primary ms-5 rounded-pill">login/register</a>
                        </div> --}}

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
{{-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="mx-auto input-group w-75 d-flex">
                    <input type="search" class="p-3 form-control" placeholder="keywords"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="p-3 input-group-text"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Modal Search End -->
