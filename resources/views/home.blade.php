@extends('layouts/app')

@section('main')
    <div id="carouselExampleIndicators" class="carousel slide" style="height: 40vh; overflow:hidden">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/carousel1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid">
        {{-- Electronics --}}
        <div class="custom-nav">
            <button class="custom-prev">
                <</button>
                    <div class="container-fluid bg-light-subtle mt-5 p-4">
                        <h4>Recommended deals for you</h4>
                        <div class="owl-carousel owl-theme">
                            @foreach ($Electronics as $Electronic)
                                <div class="card" style="width: 230px;">
                                    <img src="{{ asset('/uploads/products/' . $Electronic->product_img) }}"
                                        class="card-img-top" alt="..." style="height: 200px;width:230px">
                                    <div class="card-body p-1">
                                        <h5 class="card-title m-0 p-0">{{ $Electronic->name }}</h5>
                                        <span class="card-text">{{ $Electronic->details }}</span>
                                        <form action="/productDetials" method="POST">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{ $Electronic->id }}">
                                            <button type="submit" class="btn btn-primary btn-sm">View</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="custom-next">></button>
        </div>

        {{-- Kitchen --}}
        <div class="custom-nav">
            <button class="custom-prev">
                <</button>
                    <div class="container-fluid bg-light-subtle mt-5 p-4">
                        <h4>Up to 70% off | Decorate your home with the right showpieces</h4>
                        <div class="owl-carousel owl-theme">
                            @foreach ($Kitchen as $kit)
                                <div class="card" style="width: 230px;">
                                    <img src="{{ asset('/uploads/products/' . $kit->product_img) }}" class="card-img-top"
                                        alt="..." style="height: 200px;width:230px">
                                    <div class="card-body p-1">
                                        <h5 class="card-title m-0 p-0">{{ $kit->name }}</h5>
                                        <span class="card-text">{{ $kit->details }}</span>
                                        <form action="/productDetials" method="POST">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{ $kit->id }}">
                                            <button type="submit" class="btn btn-primary btn-sm">View</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="custom-next">></button>
        </div>

        {{-- Skin Care --}}
        <div class="custom-nav">
            <button class="custom-prev">
                <</button>
                    <div class="container-fluid bg-light-subtle mt-5 p-4">
                        <h4>Up to 40% off | Skin Care</h4>
                        <div class="owl-carousel owl-theme">
                            @foreach ($Beauty as $Beau)
                                <div class="card" style="width: 230px;">
                                    <img src="{{ asset('/uploads/products/' . $Beau->product_img) }}" class="card-img-top"
                                        alt="..." style="height: 200px;width:230px">
                                    <div class="card-body p-1">
                                        <h5 class="card-title m-0 p-0">{{ $Beau->name }}</h5>
                                        <span class="card-text">{{ $Beau->details }}</span>
                                        <form action="/productDetials" method="POST">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{ $Beau->id }}">
                                            <button type="submit" class="btn btn-primary btn-sm">View</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="custom-next">></button>
        </div>

        {{-- Women's Fashion --}}
        <div class="custom-nav">
            <button class="custom-prev">
                <</button>
                    <div class="container-fluid bg-light-subtle mt-5 p-4">
                        <h4>Flat 60% off | Women's traditional fashion for every occasion</h4>
                        <div class="owl-carousel owl-theme">
                            @foreach ($Womenskurtis as $Kurtis)
                                <div class="card" style="width: 230px; height:340px">
                                    <img src="{{ asset('/uploads/products/' . $Kurtis->product_img) }}"
                                        class="card-img-top" alt="..." style="height: 250px;width:230px">
                                    <div class="card-body p-1">
                                        <h5 class="card-title m-0 p-0">{{ $Kurtis->name }}</h5>
                                        <span class="card-text">{{ $Kurtis->details }}</span>
                                        <form action="/productDetials" method="POST">
                                            @csrf
                                            <input type="hidden" name="productId"  value="{{ $Kurtis->id }}">
                                            <button type="submit" class="btn btn-primary btn-sm">View</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="custom-next">></button>
        </div>


    </div>
@endsection
