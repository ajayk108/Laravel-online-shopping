@extends('layouts.app')

@section('main')
    <div class="container-fluid mt-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%;">sr.no</th>
                    <th scope="col" style="width: 15%;">Name</th>
                    <th scope="col" style="width: 30%;">Detail</th>
                    <th class="text-center" scope="col" style="width: 10%;">Type</th>
                    <th class="text-center" scope="col" style="width: 15%;">Image</th>
                    <th scope="col" style="width: 5%;">Qty</th>
                    <th scope="col" style="width: 5%;">Price</th>
                    <th scope="col" style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartProducts as $cartProduct)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $cartProduct->product->name }}</td>
                    <td>{{ $cartProduct->product->details }}</td>
                    <td class="text-center">{{ $cartProduct->product->product_type }}</td>
                    <td class="text-center"><img src="{{ asset('uploads/products/'.$cartProduct->product->product_img) }}" style="width:100px; height:100px;border-radius:10%;mix-blend-mode:multiply" alt=""></td>
                    <td><input type='number' step='1' value="1" style='height:30px;width:40px'></td>
                    <td>{{ $cartProduct->product->price }}</td>
                    <td>@mdo</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
