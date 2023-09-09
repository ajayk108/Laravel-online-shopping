@extends('layouts.app')

@section('main')
    <div class="container-fluid mt-2 text-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%;">sr.no</th>
                    <th scope="col" style="width: 15%;">Name</th>
                    <th scope="col" style="width: 30%;">Detail</th>
                    <th class="text-center" scope="col" style="width: 5%;">Type</th>
                    <th class="text-center" scope="col" style="width: 10%;">Image</th>
                    <th class="text-center" scope="col" style="width: 20%;">Quantity</th>
                    <th scope="col" style="width: 5%;">Price</th>
                    <th scope="col" style="width: 5%;">Total</th>
                    <th scope="col" style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $Grtotal=0;
                @endphp
                @foreach ($cartProducts as $cartProduct)
                    <tr>
                        @php
                        $Grtotal += $cartProduct->total;
                        @endphp
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $cartProduct->product->name }}</td>
                        <td>{{ $cartProduct->product->details }}</td>
                        <td class="text-center">{{ $cartProduct->product->product_type }}</td>
                        <td class="text-center"><img
                                src="{{ asset('uploads/products/' . $cartProduct->product->product_img) }}"
                                style="width:100px; height:100px;border-radius:10%;mix-blend-mode:multiply" alt="">
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                <form action="/cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{ $cartProduct->product_id }}">
                                    <input type="hidden" name="decrement" value="dec">
                                    <button type="submit" @if ($cartProduct->quantity == 1) disabled @endif
                                        class="btn btn-danger btn-sm me-1">-</button>
                                </form>
                                <input type='text' value="{{ $cartProduct->quantity }}" style='height:30px;width:20px'>
                                <form action="/cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{ $cartProduct->product_id }}">
                                    <input type="hidden" name="increment" value="inc">
                                    <button class="btn btn-success btn-sm ms-1">+</button>
                                </form>
                            </div>
                        </td>
                        <td> ₹{{ number_format($cartProduct->product->price) }}</td>
                        <td> ₹{{ number_format($cartProduct->total) }}</td>
                        <td><a href="cart/{{ $cartProduct->id }}/delete" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6"></td>
                    <td><strong>GrandTotal</strong></td>
                    <td><strong> ₹{{ number_format($Grtotal,2) }}</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <a class="btn cartbuynow rounded-pill d-flex justify-content-center align-items-center">Buy Now</a>
        </div>
    </div>
@endsection
