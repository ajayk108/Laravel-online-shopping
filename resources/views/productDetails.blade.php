@extends('layouts/app')

@section('main')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                @foreach ($product as $p)
                    <div class="card">
                        <div class="card-header">{{ $p->product_type }}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('uploads/products/' . $p->product_img) }}" alt=""
                                    style="width:100%">
                                </div>
                                <div class="col-md-6">
                                    <h1>{{ $p->name }}</h1>
                                    <h3>{{ $p->details }}</h3>
                                    <hr>
                                    <button class="btn btn-danger btn-sm mb-2">Deal of the Day</button>
                                    <h2 class="mb-3"><span class="text-muted">&#8377; </span>{{ $p->price }}</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="/cart" method="POST">
                                                @csrf
                                                <input type="hidden" name="productId" value="{{ $p->id }}">
                                                <button type="submit" class="btn addtocart rounded-pill">Add to Cart</button>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="#" method="POST">
                                                @csrf
                                                <button type="submit" class="btn buynow rounded-pill">Buy Now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
