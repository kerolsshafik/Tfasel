@extends('front.layout.app')

@section('title')
    {{ $category->name_en }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $category->name_en }}</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($categorie as $cat)
                    <div class="col">
                        <div class="shadow-sm card">
                            <a href="{{ route('Tafasel.show_article', $cat) }}">
                                <img decoding="async" src="{{ $cat->getFirstMediaUrl('big_images') }}"
                                    class="rounded img-fluid img-zoomin" height="300px" style="width: auto;" alt="">
                            </a>
                            <div class="card-body">
                                <a class="mb-2 h4 text-dark link-hover" href="{{ route('Tafasel.show_article', $cat) }}">
                                    <b class="link-hover">{{ $cat->title_en }}</b>
                                </a>
                                <br>
                                <p class="link-hover card-text">
                                    {{ Str::limit($cat->description_en, 80, '...') }}
                                </p>

                                <br>
                                <b>{{ $cat->user->name }} </b>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <p type="text" class="text-warning">{{ $cat->count }} View</p>
                                    </div>
                                    <small class="text-warning">{{ $cat->created_at->format('D/ h:i') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination moved outside the loop -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $categorie->links() }} <!-- Use the default pagination view -->
            </div>
        </div>
    </div>
@endsection
