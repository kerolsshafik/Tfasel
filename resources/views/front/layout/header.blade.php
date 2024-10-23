<!-- Navbar start -->
<div class="px-0 container-fluid sticky-top">
    <div class="container-fluid topbar bg-dark d-none d-lg-block">
        <div class="container px-0">
            <div class="topbar-top d-flex justify-content-between flex-lg-wrap">
                <div class="flex-grow-0 top-info">
                    <span class="rounded-circle btn-sm-square bg-primary me-2">
                        <i class="text-white fas fa-bolt"></i>
                    </span>
                    <div class="border-white pe-2 me-3 border-end d-flex align-items-center">
                        <p class="mb-0 text-white fs-6 fw-normal">Trending</p>
                    </div>
                    <div class="overflow-hidden" style="width: 735px;">
                        <div id="note" class="ps-2">
                            <img src="img/features-fashion.jpg"
                                class="border img-fluid rounded-circle border-3 border-primary me-2"
                                style="width: 30px; height: 30px;" alt="">
                            <a href="#">
                                <p class="mb-0 text-white link-hover">Newsan unknown printer took a galley of type
                                    andscrambled Newsan.</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="top-link flex-lg-wrap">
                    <i class="text-white fas fa-calendar-alt border-end border-secondary pe-2 me-2"> <span
                            class="text-body">Tuesday, Sep 12, 2024</span></i>
                    <div class="d-flex icon">
                        <p class="mb-0 text-white me-2">Follow Us:</p>
                        <a href="" class="me-2"><i class="fab fa-facebook-f text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-twitter text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-instagram text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-youtube text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-linkedin-in text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-skype text-body link-hover"></i></a>
                        <a href="" class=""><i class="fab fa-pinterest-p text-body link-hover"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl">
                <a href="index.html" class="mt-3 navbar-brand">
                    <p class="mb-2 text-primary display-6" style="line-height: 0;">Newsers</p>
                    <small class="text-body fw-normal" style="letter-spacing: 12px;">Nespaper</small>
                </a>
                <button class="px-3 py-2 navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="py-3 collapse navbar-collapse bg-light" id="navbarCollapse">
                    <div class="mx-auto navbar-nav border-top">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="detail-page.html" class="nav-item nav-link">Detail Page</a>
                        <a href="404.html" class="nav-item nav-link">404 Page</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dropdown</a>
                            <div class="m-0 dropdown-menu bg-secondary rounded-0">
                                <a href="#" class="dropdown-item">Dropdown 1</a>
                                <a href="#" class="dropdown-item">Dropdown 2</a>
                                <a href="#" class="dropdown-item">Dropdown 3</a>
                                <a href="#" class="dropdown-item">Dropdown 4</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                    </div>
                    <div class="pt-3 d-flex flex-nowrap border-top pt-xl-0">
                        <div class="d-flex">
                            <img src="img/weather-icon.png" class="img-fluid w-100 me-2" alt="">
                            <div class="d-flex align-items-center">
                                <strong class="fs-4 text-secondary">31°C</strong>
                                <div class="d-flex flex-column ms-2" style="width: 150px;">
                                    <span class="text-body">NEW YORK,</span>
                                    <small>Mon. 10 jun 2024</small>
                                </div>
                            </div>
                        </div>
                        <button
                            class="my-auto bg-white border btn-search btn border-primary btn-md-square rounded-circle"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-primary"></i></button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>
<!-- Modal Search End -->
