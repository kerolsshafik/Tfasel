<!-- Footer Start -->
<div class="py-5 container-fluid bg-light footer">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#" class="flex-wrap d-flex flex-column">
                        <img src="{{ asset('img/logo5.jpg') }}" class="img-zoominimg-fluid rounded-circle " alt=""
                            style="width:100px; height:80px;">
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="overflow-hidden d-flex position-relative rounded-pill">

                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 col-xl-3">
                <div class="footer-item-1">
                    <h4 class="mb-4 text-warning">Get In Touch</h4>
                    <p class="text-warning line-h">Address: <span class="text-primary">Giza, Big Cairo</span></p>
                    <p class="text-warning line-h">Email: <span class="text-primary">TFASEL@gmail.com</span></p>
                    <p class="text-warning line-h">Phone: <span class="text-primary">+0120000000</span></p>
                    <div class="d-flex line-h">
                        <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-twitter text-dark"></i></a>
                        <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-facebook-f text-dark"></i></a>
                        <a class="btn btn-light me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-youtube text-dark"></i></a>
                        <a class="btn btn-light btn-md-square rounded-circle" href=""><i
                                class="fab fa-linkedin-in text-dark"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="footer-item-2">
                    <div class="mb-4 d-flex flex-column">
                        <h4 class="mb-4 text-warning">Recent Posts</h4>
                        @foreach ($articles as $article)
                            {{-- @dd($article); --}}
                            <div class="d-flex align-items-center">
                                <div class="overflow-hidden border border-2 rounded-circle border-warning">
                                    {{-- <img src="{{ $article->getFirstMediaUrl('big_images') }}"  img\news-1.jpg --}}
                                    <img src="{{ $article->getFirstMediaUrl('big_images') }}"
                                        class="img-zoomin img-fluid rounded-circle" alt=""
                                        style="height: 80px;  max-width:80px;">



                                </div>
                                <div class="d-flex flex-column ps-4">
                                    <p class="mb-3 text-primary text-uppercase">{{ $article->category->name_en }}</p>
                                    <a href="{{ route('Tafasel.show_article', $article) }}"class="text-primary h6">
                                        {{ $article->title_en }}
                                    </a>
                                    <small class="text-primary d-block"><i class="fas fa-calendar-alt me-1"></i> Dec
                                        {{ $article->created_at->format('Y-m-d') }}</small>

                                    <br>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="d-flex flex-column text-start footer-item-3">
                    <h4 class="mb-4 text-warning">Categories</h4>
                    @foreach ($categories as $category)
                        <a class="text-primary btn-link" href="{{ route('Tafasel.news', $category) }}"><i
                                class="text-warning fas fa-angle-right me-2"></i>
                            {{ $category->name_en }}</a>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="footer-item-4">
                    <h4 class="mb-4 text-warning">Our Gallary</h4>
                    <div<div class="row g-2">
                        @if ($galleries->isNotEmpty())
                            @foreach ($galleries as $gallery)
                                <div class="col-4">
                                    <div class="overflow-hidden rounded">
                                        @if ($gallery->getFirstMedia('big_images'))
                                            <img src="{{ $gallery->getFirstMedia('big_images')->getUrl() }}"
                                                class="rounded img-zoomin img-fluid "
                                                alt=""style="height: 80px; width: auto;">
                                        @else
                                            <p>No image available</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No galleries available.</p>
                        @endif
                </div>


            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="py-4 container-fluid copyright bg-dark">
    <div class="container">
        <div class="row">
            <div class="mb-3 text-center col-md-6 text-md-start mb-md-0">
                <span class="text-warning"><a href="#"><i class="fas fa-copyright text-warning me-2"></i>TFASEL
                    </a>, All right reserved.</span>
            </div>
            <div class="my-auto text-center ttext-warning col-md-6 text-md-end">

            </div>
        </div>
    </div>
    <!-- Copyright End -->
